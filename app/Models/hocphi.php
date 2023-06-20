<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocphi extends Model
{
    use HasFactory;
    protected $table = "hocphi";
    protected $fillable = ['name', 'price', 'status'];
}
