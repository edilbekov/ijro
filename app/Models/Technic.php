<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technic extends Model
{
    use HasFactory;
    protected $fillable=['name','measure','militaries','total'];
}
