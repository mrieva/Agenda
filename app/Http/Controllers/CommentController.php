<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message_content' => 'required|string|max:1000',
            'tugas_id' => 'required|exists:guru_tugas,id'
        ]);

        Comment::create([
            'message_content' => $request->message_content,
            'tugas_id' => $request->tugas_id,
            'user_id' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }

}
