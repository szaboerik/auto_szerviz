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
    protected $primaryKey = 'besz_azon';
    
}
