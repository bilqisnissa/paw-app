<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vet extends Model
{
    use HasFactory;
    protected $table = "tb_vet";
    protected $fillable = [
        'vet_name',
        'vet_workplace',
        'vet_location',
        'vet_price',
        'vet_information'
    ];
}
