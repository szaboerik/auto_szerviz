<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alkatresz extends Model
{
    use HasFactory;
    protected $primaryKey = 'alk_azon';


    public function beszerzes()
    {
        return $this->hasMany(Beszerzes::class, "alkatresz");
    }

    
}
