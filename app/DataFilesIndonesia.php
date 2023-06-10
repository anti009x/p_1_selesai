<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataFilesIndonesia extends Model
{
    protected $table = 'DataFilesIndonesia'; // Ganti "nama_tabel_database" dengan nama tabel yang sesuai

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = ['nama_file', 'jenis_file','file_path'];
}
