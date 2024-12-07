<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    // Specify the fields that can be mass-assigned
    protected $fillable = ['class_name', 'class_fee', 'status'];
}
