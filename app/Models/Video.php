<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
      protected $table = 'video'; 
    protected $fillable = [
        'judul',
        'url',
        'penulis_id',
        'kategori',
        'views',
    ];
    // app/Models/Video.php
public function getEmbedUrlAttribute()
{
    return str_replace('watch?v=', 'embed/', $this->url);
}

    // Relasi dengan model User (penulis)
    public function penulis()
    {
        return $this->belongsTo(User::class, 'penulis_id');
    }
}
