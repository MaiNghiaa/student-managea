<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thanhtoan extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';

    protected $table = "thanhtoan";
    protected $fillable = ['student_id', 'hocphi_id', 'status', 'image'];
}
