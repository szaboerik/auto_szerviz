<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Munkalap extends Model
{
    use HasFactory;

    protected $primaryKey = 'm_szam';

    public function auto(){
        return $this->belongsTo(Auto::class, "autoId");
    }

    protected $dateFormat = 'Y-m-d';
}
