<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Markak extends Model
{
    use HasFactory;

protected $primaryKey = 'marka';

public $incrementing = false;

// In Laravel 6.0+ make sure to also set $keyType
protected $keyType = 'string';
}
