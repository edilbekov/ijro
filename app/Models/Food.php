<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable=['name','measure','mtt','qism_21131','qism_71181','qism_53008','qism_49093','total'];
}
