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

    public function students(Request $request)
    {
        if (!$request->input('uid') || !$request->input('filters'))
        {
            return response()->json([
                'success' => false,
                'error' => 'Requête invalide'
            ]);
        }

        $students = [];

        if (Student::picker($students))
        {
            return response()->json([
                'success' => true,
                'data' => [
                    'voteId' => 0,
                    'students' => $students
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'error' => 'Aucuns étudiants trouvé'
        ]);
    }

    public function vote(Request $request)
    {
        var_dump($request->all());
    }
}
