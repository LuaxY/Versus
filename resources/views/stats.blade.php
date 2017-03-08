@extends('layout')

@section('content')

    <div class="header clearfix">
        <h3><img src="{{ URL::asset('imgs/header.png') }}" alt="Logo" class="" width="50"/> Versus</h3>
        <a href="{{ route('ladder') }}" class="btn btn-default"><i class="fa fa-list" aria-hidden="true"></i> Classement</a>
        <a href="{{ route('home') }}" class="btn btn-default"><i class="fa fa-trophy" aria-hidden="true"></i> Voter</a>
    </div>

    <h3>{{ $student->name }} <i class="fa fa-{{ $student->sex == 'M' ? 'mars' : 'venus' }}" aria-hidden="true"></i> {{ $student->promotion }}</h3>
    <img src="{{ URL::asset('imgs/students/' . $student->uid . '.jpg') }}" while="200" height="200">
    <br><br>

    <table class="table table-striped">
        <tr>
            <th class="centered">Score</th>
            <th class="centered">Image</th>
            <th class="left">Nom</th>
            <th></th>
            <th class="right">Nom</th>
            <th class="centered">Image</th>
            <th class="centered">Score</th>
        </tr>
        @foreach ($student->votes() as $vote)
            <tr>
                <td class="centered @if ($vote['myScore'] > $vote['vsScore']) winner @elseif ($vote['myScore'] == $vote['vsScore']) equal @else looser @endif">{{ $vote['myScore'] }}</td>
                <td class="centered @if ($vote['myScore'] > $vote['vsScore']) winner @elseif ($vote['myScore'] == $vote['vsScore']) equal @else looser @endif"><img src="{{ URL::asset('imgs/students/' . $student->uid . '.jpg') }}" width="30" height="30"></td>
                <td class="left @if ($vote['myScore'] > $vote['vsScore']) winner @elseif ($vote['myScore'] == $vote['vsScore']) equal @else looser @endif">{{ $student->name }}</td>
                <td class="centered"> VS </td>
                <td class="right @if ($vote['myScore'] < $vote['vsScore']) winner @elseif ($vote['myScore'] == $vote['vsScore']) equal @else looser @endif"><a href="{{ route('stats', [$vote['versus']->uid]) }}">{{ $vote['versus']->name }}</a></td>
                <td class="centered @if ($vote['myScore'] < $vote['vsScore']) winner @elseif ($vote['myScore'] == $vote['vsScore']) equal @else looser @endif"><img src="{{ URL::asset('imgs/students/' . $vote['versus']->uid . '.jpg') }}" width="30" height="30"></td>
                <td class="centered @if ($vote['myScore'] < $vote['vsScore']) winner @elseif ($vote['myScore'] == $vote['vsScore']) equal @else looser @endif">{{ $vote['vsScore'] }}</td>
            </tr>
        @endforeach
    </table>
@stop
