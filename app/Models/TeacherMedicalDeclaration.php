<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherMedicalDeclaration extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'teacher_medical_declaration';
    protected $fillable = ['id', 'status', 'img'];
}
