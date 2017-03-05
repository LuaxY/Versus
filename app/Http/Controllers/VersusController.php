<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class VersusController extends Controller
{
    public function index()
    {
        $students = [];

        if (Student::picker($students))
        {
            return view('versus', ['students' => $students]);
        }

        die(1);
    }
}
