<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_family extends Model
{
    use HasFactory;
    protected $table = "student_family";
    protected $fillable = ['id', 'year', 'level', 'chuongtrinh', 'nation', 'highschoolgra', 'CMND', 'noicap', 'fathername', 'fatherbirth', 'fatherjob', 'fatherphone', 'highschool', 'mothername', 'motherbirth', 'motherjob', 'motherphone', 'household', 'avatar'];
    public $timestamps = false;
}
