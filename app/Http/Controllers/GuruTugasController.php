<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengumpulanTugas;
use App\Models\GuruTugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Comment;


class GuruTugasController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kelas' => 'required|string|in:X,XI,XII', // Validasi kelas agar sesuai dengan enum
            'jurusan' => 'required|string|in:RPL 1,RPL 2,MM,DKV 1,DKV 2,OTKP 1,OTKP 2,OTKP 3,PM 1,PM 2,PM 3,AKL 1,AKL 2,TBS 1,TBS 2', // Validasi jurusan agar sesuai dengan enum
            'topik' => 'required|string',
            'deskripsi' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,zip,ppt,pptx,html,css,js,ts,jsx,tsx,php,sql,xml,json,yaml,yml,gif,svg|max:10048',
            'tengat' => 'required|date',
            'ketentuan' => 'nullable|string',
            'url' => 'nullable|url',
        ]);

        // Upload file jika ada
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('tugas', $originalFileName, 'public'); // Menyimpan file dengan nama asli
        }

        // Ambil nama guru yang sedang login
        $namaGuru = auth()->user()->name;

        //ambil id guru yang sedang login
        $idGuru = auth()->user()->id;

        // Buat tugas baru
        GuruTugas::create([
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'topik' => $request->topik,
            'deskripsi' => $request->deskripsi,
            'file' => $filePath,
            'tengat' => $request->tengat,
            'ketentuan' => $request->ketentuan,
            'url' => $request->url,
            'nama_guru' => $namaGuru, // Tambahkan nama guru yang login
            'id_guru' => $idGuru,
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil dibuat!');
    }


    public function indexGuru()
    {
        $user = auth()->user();

        return view('guru.indexguru', compact('user'));
    }

    public function tugasSiswa(Request $request)
    {
        $user = auth()->user();
        $userId = $user->id;
        $kelas = $user->kelas;
        $jurusan = $user->jurusan;

        // Tugas yang belum diserahkan
        $tugas = GuruTugas::where('kelas', $kelas)
            ->where('jurusan', $jurusan)
            ->whereDoesntHave('pengumpulanTugas', function ($query) use ($userId) {
                $query->where('user_id', $userId)
                    ->where('status_siswa', 'diserahkan');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Tugas yang sudah diserahkan
        $tugasDiserahkan = PengumpulanTugas::where('user_id', $userId)
            ->where('status_siswa', 'diserahkan')
            ->with('guruTugas') // Mengambil relasi untuk mendapatkan detail tugas
            ->orderBy('created_at', 'desc')
            ->get();

        return view('siswa.tugassiswa', compact('tugas', 'tugasDiserahkan'));
    }

    public function tugasSekret(Request $request)
    {
        $user = auth()->user();
        $userId = $user->id;
        $kelas = $user->kelas;
        $jurusan = $user->jurusan;

        // Tugas yang belum diserahkan
        $tugas = GuruTugas::where('kelas', $kelas)
            ->where('jurusan', $jurusan)
            ->whereDoesntHave('pengumpulanTugas', function ($query) use ($userId) {
                $query->where('user_id', $userId)
                    ->where('status_siswa', 'diserahkan');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Tugas yang sudah diserahkan
        $tugasDiserahkan = PengumpulanTugas::where('user_id', $userId)
            ->where('status_siswa', 'diserahkan')
            ->with('guruTugas') // Mengambil relasi untuk mendapatkan detail tugas
            ->orderBy('created_at', 'desc')
            ->get();

        return view('sekretaris.tugassekretaris', compact('tugas', 'tugasDiserahkan'));
    }

    public function indexSiswa(Request $request)
    {
        $user = auth()->user();
        $userId = $user->id;
        $kelas = $user->kelas; // Ambil kelas user yang login
        $jurusan = $user->jurusan;

        // Ambil semua tugas yang belum diserahkan oleh user yang login, filter berdasarkan kelas
        $tugas = GuruTugas::where('kelas', $kelas) // Filter tugas berdasarkan kelas siswa
            ->where('jurusan', $jurusan)
            ->whereDoesntHave('pengumpulanTugas', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();

        return Auth::check() && Auth::user()->role == 'siswa'
            ? view('siswa.indexsiswa', compact('tugas'))
            : redirect('/')->with('error', 'Akses ditolak');
    }
    public function indexSekret(Request $request)
    {
        $user = auth()->user();
        $userId = $user->id;
        $kelas = $user->kelas; // Ambil kelas user yang login
        $jurusan = $user->jurusan;

        // Ambil semua tugas yang belum diserahkan oleh user yang login, filter berdasarkan kelas
        $tugas = GuruTugas::where('kelas', $kelas) // Filter tugas berdasarkan kelas siswa
            ->where('jurusan', $jurusan)
            ->whereDoesntHave('pengumpulanTugas', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();

        return Auth::check() && Auth::user()->role == 'sekretaris'
            ? view('sekretaris.indexsekretaris', compact('tugas'))
            : redirect('/')->with('error', 'Akses ditolak');
    }


    public function detailTugas($id)
    {
        $task = GuruTugas::findOrFail($id);

        return view('siswa.announcesiswa', compact('task'));
    }







    public function detailSekret(Request $request, $id)
    {
        $task = GuruTugas::find($id);
        return view('sekretaris.announcesekret', compact('task'));
    }

    public function showTable()
    {
        // Ambil data yang belum diperiksa
        $belumDiperiksa = PengumpulanTugas::where('status_siswa', 'diserahkan')
            ->where('status', 'belum diperiksa')
            ->whereHas(
                'guruTugas',
                function ($query) {
                    $query->where('id_guru', auth()->user()->id);
                }
            )
            ->with('user')
            ->get();

        // Ambil data yang sudah diperiksa
        $sudahDiperiksa = PengumpulanTugas::where('status', 'sudah diperiksa')
            ->whereHas('guruTugas', function ($query) {
                $query->where('id_guru', auth()->user()->id);
            })
            ->with('user')
            ->get();

        return view('guru.tabeltugasguru', compact('belumDiperiksa', 'sudahDiperiksa'));
    }


    public function periksa($id)
    {
        // Ambil tugas beserta komentar yang sudah ada
        $tugas = PengumpulanTugas::with(['komentar.user'])->findOrFail($id);
        $guruTugas = GuruTugas::where('id', $tugas->guru_tugas_id)->first();

        // tampilkan komentar
        $komentar = $tugas->komentar;

        return view('guru.periksa', compact('tugas', 'guruTugas', 'komentar'));
    }

    // Tambah method untuk menyimpan komentar
    public function storeKomentar(Request $request, $id)
    {
        // Validasi input komentar
        $request->validate([
            'message_content' => 'required|string|max:255',
        ]);

        // Simpan komentar ke database
        Comment::create([
            'tugas_id' => $id,
            'guru_id' => Auth::id(), // Ambil ID guru yang sedang login
            'siswa_id' => $request->siswa_id, // ID siswa dari input
            'message_content' => $request->message_content,
        ]);

        return redirect()->route('periksa', $id)->with('success', 'Komentar berhasil ditambahkan!');
    }



    public function periksaTugas(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        $tugas = PengumpulanTugas::findOrFail($id);
        $tugas->update([
            'nilai' => $request->nilai,
            'status' => 'sudah diperiksa',
        ]);

        return redirect()->route('tabelguru', $id)->with('success', 'Tugas sudah diperiksa dan diberi nilai.');
    }

    // Menampilkan halaman preview tugas
    public function showPreview($id)
    {
        $tugas = PengumpulanTugas::with(['komentar.user'])->findOrFail($id);
        $guruTugas = GuruTugas::where('id', $tugas->guru_tugas_id)->first();

        return view('guru.preview-tugas', compact('tugas', 'guruTugas'));
    }


    public function updateNilai(Request $request, $id)
    {
        $tugas = PengumpulanTugas::findOrFail($id);

        // Simpan nilai dan update status
        $tugas->nilai = $request->nilai;
        $tugas->status = 'sudah diperiksa'; // Update status jika sudah diperiksa
        $tugas->save();

        return redirect()->route('tabelguru', $id)->with('success', 'Nilai berhasil diperbarui.');
    }

    // Metode untuk membatalkan pemeriksaan
    public function batalPeriksa($id)
    {
        $tugas = PengumpulanTugas::findOrFail($id);
        $tugas->nilai = null; // Reset nilai
        $tugas->status = 'belum diperiksa'; // Update status
        $tugas->save();

        return redirect()->route('tabelguru', $id)->with('success', 'Pemeriksaan dibatalkan.');
    }
}
