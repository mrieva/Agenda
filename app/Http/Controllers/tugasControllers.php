<?php




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class tugasController extends Controller
{
    // Upload file
    public function uploadFile(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|file|max:2048' // maksimal 2MB
        ]);

        // Simpan file di server
        $path = $request->file('file')->store('uploads'); // Simpan di folder 'uploads'

        // Kembalikan response
        return response()->json(['message' => 'File uploaded successfully', 'path' => $path]);
    }

    // Upload link
    public function uploadLink(Request $request)
    {
        // Validasi link
        $request->validate(['link' => 'required|url']);

        // Simpan link di database atau proses sesuai kebutuhan
        // Contoh: Link::create(['url' => $request->link]);

        // Kembalikan response
        return response()->json(['message' => 'Link uploaded successfully', 'link' => $request->link]);
    }
}
