<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengumpulanTugas;
use App\Models\GuruTugas;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PengumpulanTugasController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'judul' => 'required|string',
            'media_type' => 'required|in:file,url',
            'siswa_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,html,php,sql,xml,json,css,jsx,tsx,js,ts,yaml,yml,zip,rar|max:10048',
            'siswa_url' => 'nullable|url',
            'id' => 'required|exists:guru_tugas,id',
        ]);

        $filePath = null;
        $originalFileName = null;

        if ($request->media_type == 'file' && $request->hasFile('siswa_file')) {
            $file = $request->file('siswa_file');
            $originalFileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('pengumpulan', $originalFileName, 'public');

            // Simpan data file ke database
            // Misalnya: PengumpulanTugas::create([...]);
        } elseif ($request->media_type == 'url' && $request->filled('siswa_url')) {
            $url = $request->input('siswa_url');

            // Simpan data URL ke database
            // Misalnya: PengumpulanTugas::create([...]);
        } else {
            return back()->withErrors('Media tidak valid atau tidak ada.');
        }

        $user = auth()->user();
        $submittedTask = PengumpulanTugas::where('guru_tugas_id', $request->id)
            ->where('user_id', $user->id)
            ->first();

        if ($submittedTask) {
            $submittedTask->update([
                'media_type' => $request->media_type,
                'judul' => $request->judul,
                'siswa_file' => $filePath,
                'siswa_url' => $request->siswa_url,
                'status_siswa' => 'diserahkan',
                'nama_siswa' => $user->name,
                'kelas_siswa' => $user->kelas,
                'jurusan_siswa' => $user->jurusan,
                'original_file_name' => $originalFileName,
            ]);
        } else {
            PengumpulanTugas::create([
                'guru_tugas_id' => $request->id,
                'user_id' => $user->id,
                'media_type' => $request->media_type,
                'judul' => $request->judul,
                'siswa_file' => $filePath,
                'siswa_url' => $request->siswa_url,
                'status_siswa' => 'diserahkan',
                'nama_siswa' => $user->name,
                'kelas_siswa' => $user->kelas,
                'jurusan_siswa' => $user->jurusan,
                'original_file_name' => $originalFileName,
            ]);
        }

        return redirect('tugas-siswa')->with('success', 'Tugas berhasil dikumpulkan.');
    }



    public function showDiserahkan($id)
    {
        // Ambil data tugas dari tabel guru_tugas berdasarkan ID tugas
        $task = GuruTugas::find($id);

        // Ambil data pengumpulan tugas dari tabel pengumpulan_tugas
        $submittedTask = PengumpulanTugas::where('guru_tugas_id', $id)
            ->where('user_id', Auth::id()) // hanya data dari siswa yang login
            ->first();

        // Pastikan data tugas dan pengumpulan tugas ditemukan
        if (!$task || !$submittedTask) {
            return redirect()->back()->with('error', 'Tugas tidak ditemukan.');
        }

        return view('siswa.deskdiserahkan', compact('task', 'submittedTask'));
    }


    public function cancelSubmission($id)
    {
        // Cari pengumpulan tugas berdasarkan ID tugas dan ID user yang sedang login
        $submittedTask = PengumpulanTugas::where('guru_tugas_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($submittedTask) {
            // Update status menjadi 'belum diserahkan' (atau sesuai field status di tabelmu)
            $submittedTask->status_siswa = 'belum diserahkan';
            $submittedTask->status = 'belum diperiksa';
            $submittedTask->nilai = null;
            $submittedTask->save();
            return redirect('tugas-siswa')->with('success', 'Pengumpulan tugas dibatalkan.');
        }

        return redirect('/tugas/diserahkan/' . $id)->with('error', 'Pengumpulan tugas tidak ditemukan.');
    }

    public function updateNilaiStatus(Request $request)
    {
        // Ambil data tugas dari ID yang dikirim
        $tugas = PengumpulanTugas::find($request->tugas_id);

        // Update nilai dan status
        $tugas->nilai = $request->nilai;
        $tugas->status = $request->status;

        // Simpan perubahan
        $tugas->save();

        return redirect()->back()->with('success', 'Nilai dan status berhasil diupdate.');
    }

}
