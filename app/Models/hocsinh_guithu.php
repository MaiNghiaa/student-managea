<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocsinh_guithu extends Model
{
    use HasFactory;

    protected $table = "hocsinh_guithu";
    protected $fillable = ['student_id', 'image', 'type'];
}
