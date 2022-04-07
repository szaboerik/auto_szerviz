<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feladat extends Model
{
    use HasFactory;

    protected $primaryKey = 'f_szam';

    public function munkalap(){
        return $this->belongsTo(Munkalap::class, "m_szam");
    }

    public function dolgozo(){
        return $this->belongsTo(Dolgozo::class, "d_kod");
    }

    public function besz()
    {
        return $this->hasMany(Beszerzes::class, "f_szam");
    }

    protected $dateFormat = 'Y-m-d';
}
