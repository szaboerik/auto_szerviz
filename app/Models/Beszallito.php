<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beszallito extends Model
{
    use HasFactory;
    protected $primaryKey = 'beszall_kod';

    public function beszerzes()
    {
        return $this->hasMany(Beszerzes::class, "beszall_kod");
    }
}
