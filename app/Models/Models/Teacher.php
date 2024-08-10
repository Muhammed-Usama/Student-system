<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'id',
        'name_en',
        'name_ar',
        'address_en',
        'address_ar',
        'mobile',
    ];
    use HasFactory;
}
