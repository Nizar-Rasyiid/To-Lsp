<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $guarded=['id_artikel'];
    protected $primaryKey='id_artikel';
    protected $table = 'artikel';

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
