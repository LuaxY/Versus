@extends('layout')

@section('content')
    <div class="header clearfix">
        <h3><img src="{{ URL::asset('imgs/header.png') }}" alt="Logo" class="" width="50"/> Versus</h3>
        <a href="{{ route('home') }}" class="btn btn-default"><i class="fa fa-trophy" aria-hidden="true"></i> Voter</a>
    </div>

    <table class="table table-striped">
        <tr>
            <th class="centered">Position</th>
            <th>Image</th>
            <th class="centered">Infos</th>
            <th>Nom</th>
            <th>Promo</th>
            <th class="centered">Score</th>
        </tr>
        @foreach ($students as $i => $student)
            <tr class="@if ($i < 3) top-{{ $i+1 }} @endif">
                <td class="centered">{{ $i+1 }}</td>
                <td><img src="{{ URL::asset('imgs/students/' . $student->uid . '.jpg') }}" while="30" height="30"></td>
                <td class="centered">
                    <a href="https://facebook.com/{{ $student->fbId  }}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="{{ route('stats', [$student->uid]) }}"><i class="fa fa-line-chart" aria-hidden="true"></i></a>
                    <i class="fa fa-{{ $student->sex == 'M' ? 'mars' : 'venus' }}" aria-hidden="true"></i>
                </td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->promotion }}</td>
                <td class="centered">{{ $student->score }}</td>
            </tr>
        @endforeach
    </table>
@stop
