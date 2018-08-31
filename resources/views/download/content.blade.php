@section('content')

<section>
    <div class="container">
		<br><br>
		<legend align="center" style="font-family: 'PlayFair';">Congratulations!</legend>
		<a class="btn btn-warning btn-block btn-lg" href="{{asset('storage/badges/'. $user->badge_filepath)}}" download>
			DOWNLOAD
		</a>
        <a class="btn btn-success btn-block" href="{{url('/')}}">CREATE AGAIN</a><br>

        <center>
		<a href="{{asset('storage/badges/'. $user->badge_filepath)}}" download>
				<img src="{{asset('storage/badges/'. $user->badge_filepath)}}" alt="Your Profile Badge">
			</a>
        </center>
    </div>
</section>

@endsection