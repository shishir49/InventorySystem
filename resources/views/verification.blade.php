@extends('layout.master')

@section('content')

 <form method="POST" action="{{url('verify')}}">
 	    @csrf
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
                <input type="text" name="user_id" placeholder="User Id" class="form-control" style="width:300px;margin-top:20px">
            </div>
            <div class="col-md-12 text-center">
                <br/>

                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

    
    <script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img name="imageBody" src="'+data_uri+'"/>';
        } );
    }
</script>

@endsection