<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students_classrooms extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'classroom_id'];
    public $timestamps = false;
}
