<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan'; // Nama tabel dalam database
    protected $fillable = ['tgl_pengaduan', 'user_id', 'isi_laporan', 'foto', 'status'];

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}