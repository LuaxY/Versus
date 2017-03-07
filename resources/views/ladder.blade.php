@foreach($students as $student)
    #{{ $student->id }} - {{ $student->name }} - {{ $student->uid }} - {{ $student->promotion }} - {{ $student->sex }} <img src="{{ URL::asset('imgs/students/' . $student->uid . '.jpg') }}"><br>
@endforeach
