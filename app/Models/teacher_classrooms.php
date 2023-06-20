<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_classrooms extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id', 'classroom_id'];
    public $timestamps = false;
}
