<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailStudent extends Model
{
    use HasFactory;

    protected $table = "mallstudent";
    protected $fillable = ['student_id', 'content', 'type'];
}
