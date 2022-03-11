<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = ['id_kategori'];
    protected $primaryKey = 'id_kategori';

    public function artikel()
    {
       return $this->hasMany(Artikel::class);
    }
}


