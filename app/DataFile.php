<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataFile extends Model
{
    protected $table = 'data_files'; // Ganti "nama_tabel_database" dengan nama tabel yang sesuai

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = ['nama_file', 'jenis_file','file_path'];
}
