<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mallteacher extends Model
{
    use HasFactory;
    protected $table = "mallteacher";
    protected $fillable = ['teacher_id', 'content', 'type'];
}
