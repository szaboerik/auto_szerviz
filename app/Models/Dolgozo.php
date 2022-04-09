<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dolgozo extends Model
{
    use HasFactory;
    protected $primaryKey = 'd_kod';


    public function feladat()
    {
        return $this->hasMany(Feladat::class, "szerelo");
    }
}
