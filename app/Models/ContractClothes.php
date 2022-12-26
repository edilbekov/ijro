<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractClothes extends Model
{
    use HasFactory;
    protected $fillable=['harbiy_qismlar','quloqchin_telpak','qishki_kurtka','yozgi_kostyum','ichki_kiyim','botinka'];
}
