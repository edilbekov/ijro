<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Housing1 extends Model
{
    use HasFactory;
    protected $fillable=['military_rank','fio','house','comment'];
}
