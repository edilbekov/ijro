<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudjetFood extends Model
{
    use HasFactory;
    protected $fillable=['militaries','fund','months','residual'];
}
