<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanya_jawab extends Model
{
    use HasFactory;

    protected $table = 'tanya_jawab';

    protected $fillable = [
        'user_id',
        'pertanyaan',
        'jawaban',
        'psikiater_id',
        'status',
        'kategori',
        'views',
    ];

    // Relasi ke penanya
    public function penanya()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke psikiater yang menjawab
    public function psikiater()
    {
        return $this->belongsTo(User::class, 'psikiater_id');
    }
}
