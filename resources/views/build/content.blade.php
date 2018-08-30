@section('content')

<section>
    <div class="container-fluid">
        <br><br>
        <button class="btn btn-success btn-block btn-lg" id="btn-build" data-id="{{$user->id}}">BUILD IMAGE</button>
        <a class="btn btn-secondary btn-block" href="{{url('/')}}">UNDO</a><br>

        <div id="canvas">
            <div class="movable_text">
                <label>{{$user->firstname}}</label>
            </div>
            <div class="movable_img" style="top: 210px; left: 210px;">
                <img src="{{asset('storage/avatars/' . $user->avatar_filepath)}}" style="border-radius: 5px;" alt="Your picture"  width="200" height="230">
            </div>
        </div>
    </div>
</section>

@endsection