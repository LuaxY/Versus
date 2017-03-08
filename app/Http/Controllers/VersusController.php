<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cache;
use Validator;
use App\Student;
use App\Vote;

class VersusController extends Controller
{
    public function index()
    {
        return view('versus');
    }

    public function ladder()
    {
        $students = Cache::remember('ladder', 1, function () {
            return Student::orderBy('scoreAll', 'DESC')->take(50)->get();
        });

        return view('ladder', ['students' => $students]);
    }

    public function stats($studentId)
    {
        $student = Student::where('uid', $studentId)->first();

        if ($student)
        {
            return view('stats', ['student' => $student]);
        }

        // TODO: error template
        die("Etudiant invalide");
    }

    public function allCheck()
    {
        return view('allCheck', ['students' => Student::all()]);
    }

    public function students(Request $request)
    {
        if (!$request->input('uid') || !$request->input('filters'))
        {
            return $this->error('Requête invalide');
        }

        $filters = $request->input('filters');

        if (!isset($filters['promotions']) || !isset($filters['sexes']))
        {
            return $this->error('Requête invalide, actualisez la page. (#1)');
        }

        $filtersFormated = $filters['promotions'] . "|" . $filters['sexes'];

        $students = [];

        // Clean old votes
        $oldVotes = Vote::where('uid', $request->input('uid'))->where('vote', null)->where('filters', '!=', $filtersFormated)->get();

        foreach ($oldVotes as $oldVote)
        {
            $oldVote->delete();
        }

        // Check if last vote is done
        $lastVote = Vote::where('uid', $request->input('uid'))->where('vote', null)->where('filters', $filtersFormated)->first();

        if ($lastVote)
        {
            $student1 = Student::where('id', $lastVote->student1)->first();
            $student2 = Student::where('id', $lastVote->student2)->first();

            $students = [$student1, $student2];

            return response()->json([
                'success' => true,
                'data' => [
                    'voteId'   => $lastVote->id,
                    'students' => $students
                ]
            ]);
        }

        // No vote ready, create new one
        if ($this->picker($students, $filtersFormated))
        {
            $vote = new Vote;
            $vote->uid      = $request->input('uid');
            $vote->student1 = $students[0]->id;
            $vote->student2 = $students[1]->id;
            $vote->filters  = $filtersFormated;
            $vote->save();

            return response()->json([
                'success' => true,
                'data' => [
                    'voteId'   => $vote->id,
                    'students' => $students
                ]
            ]);
        }

        return $this->error('Aucuns étudiants trouvé, changez de filtres ;)');
    }

    public function vote(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uid'  => 'required|alpha_num',
            'vid'  => 'required|integer',
            'vote' => 'required|integer|min:0|max:1',
        ]);

        if ($validator->fails())
        {
            return $this->error('Requête invalide, actualisez la page. (#2)');
        }

        $vote = Vote::where('uid', $request->input('uid'))->where('id', $request->input('vid'))->first();

        if (!$vote)
        {
            return $this->error('Vote invalide, actualisez la page. (#3)');
        }

        $vote->vote = $request->input('vote');

        $winnerIndex = 'student1';

        if ($vote->vote == 1)
        {
            $winnerIndex = 'student2';
        }

        $winner = Student::where('id', $vote->$winnerIndex)->first();

        if (!$winner)
        {
            return $this->error('Vote invalide, actualisez la page. (#4)');
        }

        if ($vote->fitlers == "11111111111111|11")
        {
            $winner->score += 1;
        }

        $winner->scoreAll += 1;

        $vote->save();
        $winner->save();

        return response()->json([
            'success' => true
        ]);
    }

    private function picker(&$students, $filtersFormated)
    {
        $try = 0;
        $found = false;

        while ($try < 5)
        {
            list($promotions, $sexes) = $this->filters($filtersFormated);

            // Pick 2 random students
            $student1 = Student::whereIn('promotion', $promotions)->whereIn('sex', $sexes)->inRandomOrder()->first();
            $student2 = Student::whereIn('promotion', $promotions)->whereIn('sex', $sexes)->inRandomOrder()->first();

            // Check if pair is OK
            if ($this->check($student1, $student2))
            {
                if ($student1->id > $student2->id)
                {
                    // Swap
                    $studentT = $student1;
                    $student1 = $student2;
                    $student2 = $studentT;
                }

                $found = true;
                $students = [$student1, $student2];
                break;
            }

            $try++;
        }

        return $found;
    }

    private function check($student1, $student2)
    {
        // Check if both student exist
        if (!$student1 || !$student2) return false;

        // Check if not the same
        if ($student1->id == $student2->id) return false;

        // Check if user haven't already voted for this pair
        $similarVote = Vote::where('student1', $student1->id)->where('student2', $student2->id)->first();
        if ($similarVote) return false;

        return true;
    }

    private function filters($filters)
    {
        list($promotionsFilter, $sexesFilters) = explode('|', $filters);

        $promotionList = [
            'Infosup', 'Ingésup B1', 'Ingésup B2', 'Ingésup B3', 'Ingésup M1', 'Ingésup M2',
            'ESSCA B1', 'ESSCA B2', 'ESSCA B3', 'ISEE M1', 'ISEE M2',
            'MANAA', 'Limart B2', 'Limart B3',
            'Ancien',
        ];

        $sexesList = ['M', 'F'];

        $promotions = [];

        for ($i = 0; $i < strlen($promotionsFilter); $i++)
        {
            if ($promotionsFilter[$i] == '1')
            {
                $promotions[] = $promotionList[$i];
            }
        }

        $sexes = [];

        for ($i = 0; $i < strlen($sexesFilters); $i++)
        {
            if ($sexesFilters[$i] == '1')
            {
                $sexes[] = $sexesList[$i];
            }
        }

        return [$promotions, $sexes];
    }
}
