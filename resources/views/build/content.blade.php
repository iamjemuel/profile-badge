@section('content')

<section>
    <div class="container">
        <br><br>
        <a href="#" class="btn btn-success btn-block btn-lg" id="btn-build" data-id="{{$user->id}}">
            BUILD IMAGE
        </a>
        <a class="btn btn-warning btn-block" href="{{url('/')}}">UNDO</a>
        <center>
        	<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#instruction-modal" style="margin-top: 5px;"><i class="fa fa-info-circle"></i> Show Instructions</a>
		</center>
		
		<br>
        <div id="canvas">
            <div class="movable_text">
                {{ucfirst(explodeString($user->firstname)[0])}}
            </div>
            <div class="movable_img">
                <img src="{{asset('storage/avatars/' . $user->avatar_filepath)}}" style="border-radius: 5px;" alt="Your picture" width="200" height="230">
            </div>
        </div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="instruction-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background: #5bc0de; color: white;">
					<h5 class="modal-title" align="center"><i class="fa fa-info-circle"></i> Instructions</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="background: #ffff;">
				<ul>
					<li>Drag your image and your name according to the specified location</li>
				</ul>
				</div>
				<div class="modal-footer" style="background: #ffff;">
					<button class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection