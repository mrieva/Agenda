<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banners; // Sesuaikan dengan nama model

class BannerController extends Controller
{
    public function uploadBanner(Request $request)
    {
        // Validasi file upload
        $request->validate([
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan file gambar ke folder storage/app/public/banners
        if ($request->file('banner_image')) {
            $imagePath = $request->file('banner_image')->store('app/banners', 'public'); // Path ke storage/app/public/app/banners

            // Simpan path gambar di database
            $banner = new Banners();
            $banner->image_path = $imagePath; // Simpan path
            $banner->save();

            return response()->json(['success' => true, 'image_url' => asset('storage/' . $imagePath)]);
        }
    }

    public function showSiswaPage()
{
    // Mengambil semua data banner dari database
    // Ambil banner terakhir yang ditambahkan (misalnya, 1)
$banners = Banners::orderBy('created_at', 'desc')->take(1)->get();
// Ambil semua banner

    // Mengirimkan data ke view
    return view('siswa.indexsiswa', ['banners' => $banners]);
}

}
