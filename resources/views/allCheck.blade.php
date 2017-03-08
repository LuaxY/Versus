@foreach ($students as $student)
    <img src="{{ URL::asset('imgs/students/' . $student->uid . '.jpg') }}"> {{ $student->uid }} {{ $student->id }} {{ $student->name }} {{ $student->sex }} {{ $student->promotion }} {{ $student->fbId }}<br>
@endforeach
