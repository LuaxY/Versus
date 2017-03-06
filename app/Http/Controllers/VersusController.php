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
            return view('versus', ['voteId' => 0, 'students' => $students]);
        }

        die(1);
    }
}
