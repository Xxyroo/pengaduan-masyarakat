<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected $fillable=["pengaduan_id","tgl_tanggapan","tanggapan","user_id"];
}  
