<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avto extends Model
{
    use HasFactory;
    protected $fillable=['militaries','ats'];
}
