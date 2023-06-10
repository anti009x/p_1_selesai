<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan halaman index materi
        return view('backend.materi.index');

    }

    public function upload(Request $request)
    {
        // Logika upload file
    }
}
