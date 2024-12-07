<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassController extends Controller
{
 public function classlist()
 {
   $data=Classes::all();
   dd($data);
 }
}
