<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jelleg extends Model
{
    use HasFactory;

    protected $primaryKey = 'jelleg';

    public function feladat()
    {
        return $this->hasMany(Feladat::class, "jelleg");
    }
}
