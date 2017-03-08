<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Cache;

class Student extends Model
{
    protected $hidden = ['id', 'score'];

    public $timestamps = false;

    public function votes()
    {
        return Cache::remember('votes_' . $this->uid, 1, function () {
            $stats = [];
            $votes = Vote::where('vote', '!=', null)->where('student1', $this->id)->orWhere('student2', $this->id)->get();

            foreach ($votes as $vote)
            {
                $winner = $vote->winner();
                $looser = $vote->looser();

                $versus = null;
                $win = false;

                if ($winner->id == $this->id)
                {
                    $versus = $looser;
                    $win = true;
                }
                else
                {
                    $versus = $winner;
                }

                if (isset($stats[$versus->id]))
                {
                    if ($win)
                    {
                        $stats[$versus->id]['myScore']++;
                    }
                    else
                    {
                        $stats[$versus->id]['vsScore']++;
                    }
                }
                else
                {
                    $stats[$versus->id] = [
                        'myScore' => $win ? 1 : 0,
                        'vsScore' => $win ? 0 : 1,
                        'versus'  => $versus,
                    ];
                }
            }

            usort($stats, function($a, $b) {
                $a = $a['myScore'] + $a['vsScore'];
                $b = $b['myScore'] + $b['vsScore'];

                if ($a == $b) {
                    return 0;
                }

                return ($a < $b) ? 1 : -1;
            });

            return $stats;
        });
    }
}
