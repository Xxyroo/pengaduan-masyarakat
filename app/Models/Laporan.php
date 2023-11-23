<?php

// app/Laporan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['tgl_laporan', 'isi_laporan', 'status', 'photo_path'];

    // You can add relationships or other methods here as needed.
}