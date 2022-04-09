<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function marka(){
        return $this->belongsTo(Marka::class, "markaId");
    }

    public function rendszam()
    {
        return $this->hasMany(Munkalap::class, "autoId");
    }
}
