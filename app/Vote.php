<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function winner()
    {
        return Student::where('id', $this->vote == 0 ? $this->student1 : $this->student2)->first();
    }

    public function looser()
    {
        return Student::where('id', $this->vote == 1 ? $this->student1 : $this->student2)->first();
    }
}
