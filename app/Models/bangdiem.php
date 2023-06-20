<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bangdiem extends Model
{
    use HasFactory;

    protected $table = "bangdiem";
    protected $fillable = ['id', 'student_id', 'classroom_id', 'diemquatrinh', 'Gk', 'ck'];
    public $timestamps = false;
}
