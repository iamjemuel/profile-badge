@section('content')
<section>
    <div class="container">
        <br><br>
        Total: <span class="badge badge-success"> {{count($uploads)}} uploads</span>
        <table class="table table-striped table-bordered" id="main-table">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Avatar</th>
                    <th>Badge</th>
                </tr>
            </thead>
            <tbody>
                @if(count($uploads) > 0)
                    @foreach($uploads as $upload)
                    <tr>
                        <td>{{$upload->firstname}}</td>
                        <td>{{$upload->lastname}}</td>
                        <td>
                            <img src="{{url('storage/avatars/'. $upload->avatar_filepath)}}" width="100" height="100">
                        </td>
                        <td>
                            @if(!is_null($upload->badge_filepath) && !empty($upload->badge_filepath))
                                <img src="{{url('storage/badges/'. $upload->badge_filepath)}}" width="100" height="100">
                            @else
                                <label> No badge result </label>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                @else
                    <label> No uploads yet </label>
                @endif
            </tbody>
        </table>
        
    </div>
</section>

@endsection