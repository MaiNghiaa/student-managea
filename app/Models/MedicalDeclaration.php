<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalDeclaration extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_student';
    protected $table = "medical_declaration";
    protected $fillable = ['id_student', 'status', 'img'];
}
