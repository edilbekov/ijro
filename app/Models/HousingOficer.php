<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingOficer extends Model
{
    use HasFactory;
    protected $fillable=['military_rank','fio','institution','room','married','children'];
}
