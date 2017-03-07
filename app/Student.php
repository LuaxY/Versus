<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $hidden = ['id', 'score'];

    public static function picker(&$students)
    {
        $try = 0;
        $found = false;

        while ($try < 5)
        {
            $student1 = Student::inRandomOrder()->first();
            $student2 = Student::inRandomOrder()->first();

            if (self::check($student1, $student2))
            {
                $found = true;
                $students = [$student1, $student2];
                break;
            }

            $try++;
        }

        return $found;
    }

    private static function check($student1, $student2)
    {
        // Check if both student exist
        if (!$student1 || !$student2) return false;

        // Check if not the same
        if ($student1->id == $student2->id) return false;

        // TODO: check if user haven't already voted for this pair

        return true;
    }
}
