<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataFilesIndonesia extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DataFilesIndonesia', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file');
            $table->string('jenis_file');
            $table->string('file_path'); // Tambahkan kolom file_path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DataFilesIndonesia');
    }
}
