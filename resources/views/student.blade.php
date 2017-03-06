<div class="col-xs-6 col-sm-4 col-md-4">
    <!--<img src="{{ URL::asset('imgs/students/'. $student->uid .'.jpg') }}" alt="{{ $student->name }}" class="img-thumbnail"/>-->
    <img src="http://graph.facebook.com/{{ $student->fbId }}/picture/picture?type=large" alt="{{ $student->name }}" class="img-thumbnail"/>
    <h3>@formatName($student->name)</h3>
    <h4>{{ $student->promotion }}</h4>
    <h4>
        <i class="fa fa-{{ $student->sex == 'M' ? 'mars' : 'venus' }}" aria-hidden="true"></i>
        <a href="https://facebook.com/{{ $student->fbId }}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
    </h4>
    <button @click="vote({{ $id }})" type="button" class="btn btn-primary choose">VOTER</button>
    <!--<button @click="reload({{ $id }})"type="button" class="btn btn-danger reload"><i class="fa fa-refresh" aria-hidden="true"></i></button>-->
</div>
