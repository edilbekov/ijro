<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    use HasFactory;
    protected $fillable=['object','reconstruct_object','done','who_allocate_funds','total_sum','building_organization','boss_organization','region'];
}
