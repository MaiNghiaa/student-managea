<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diemdanh extends Model
{
    use HasFactory;

    protected $table = "diemdanh";
    protected $fillable = ['id', 'classroom_id', 'student_id', 'Dihoc', 'DiHocMuon', 'NghiKhongPhep', 'NghiCophep', 'date'];
    public $timestamps = false;
}
