<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobilizationkk extends Model
{
    use HasFactory;
    protected $fillable=['mib_name','fio','sum','date','month_percent','initial_sum','residual','done','naryad','full_paid','partially_paid','no_paid'];
}
