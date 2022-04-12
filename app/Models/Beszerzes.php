<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beszerzes extends Model
{
    use HasFactory;

    public function feladat(){
        return $this->belongsTo(Feladat::class, "f_szam");
    }
    public function alk(){
        return $this->belongsTo(Alkatresz::class, "alkatresz");
    }
    public function besz(){
        return $this->belongsTo(Beszallito::class, "beszall_kod");
    }

    protected $primaryKey = 'besz_azon';
    
}
