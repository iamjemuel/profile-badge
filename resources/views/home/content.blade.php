@section('content')
<section>
    <div class="container">
        <br>
        <legend align="center" style="font-family: 'PlayFair';">Welcome!</legend>
        <form id="upload-form" action="{{url('upload')}}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-3 col-md-3"></div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="firstname">First name:</label>
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
                        <center>
                            <p class="badge badge-warning">Place your photo properly according to the specified size of the guide.</p>
                        </center>
                        <div id="avatar"></div>
                        <div style="text-align: center;">
                            <button type="button" class="btn btn-info btn-sm control-rotate" data-deg="90">Rotate Left</button>
                            <button type="button" class="btn btn-info btn-sm control-rotate" data-deg="-90">Rotate Right</button>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3"></div>
            </div>
        </form>
        
    </div>
</section>

@endsection