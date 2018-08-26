@section('content')
<section>
    <div class="container">
        <h1 align="center">Welcome!</h1>
        
        <form id="upload-form" action="{{url('upload')}}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4 col-md-4"></div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="firstname">First name: <small><i>(do not include any second name)</i></small></label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="eg.: Juan" autofocus required>
                    </div>
                    <div class="form-group">
                            <label for="lastname">Last name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="eg.: Dela Cruz" required>
                        </div>
                    <div class="form-group">
                        <label for="photo">Choose your best photo:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*" required>
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                    <div class="avatar-container">
                        <small>Place your photo properly according to the specified size of the guide.</small>
                        <div id="avatar"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4"></div>
            </div>
        </form>
        
    </div>
</section>

@endsection