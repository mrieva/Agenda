<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi file gambar
        $request->validate([
            'bannerImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar ke storage
        $path = $request->file('bannerImage')->store('public/banners');

        // Dapatkan URL dari file yang diupload
        $url = Storage::url($path);

        // Update background banner (misal disimpan di session atau database)
        // Untuk contoh ini, saya menggunakan session
        session(['banner_url' => $url]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Background banner berhasil diubah!');
    }
}
