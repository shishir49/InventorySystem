@extends('layout.admin_layout')

@section('admin_content')

<div class="editproduct">
    <!-- EDIT / UPDATE /DELETE / VIEW-->

	<div class="admin_sidebar">
	    <p class="d_title">Dashboard</p>

	    @include('layout.side_bar')

	</div>
	<div class="dashboard_action">
	    <div class="dashboard_title">
	        <p>Edit Supplier Info</p>
	    </div> 	
        <p style="text-align: center;">{{session('msg')}}</p>
	    <div class="dashboard_table">

	    	<form method="POST" action="../update-supplier/{{$get_supplier->id}}" enctype="multipart/form-data">

	        @csrf
	    		<div class="form-group">
	    			<label>Supplier's Name</label>
	    		    <input type="text" name="supplier_name" value="{{$get_supplier->supplier_name}}" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Supplier's Phone Number</label>
	    		    <input type="text" name="phone" value="{{$get_supplier->phone}}" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Supplier's Email</label>
	    		    <input type="text" name="email" value="{{$get_supplier->email}}" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Mailing Address</label>
	    		    <input type="text" name="mailing_address" value="{{$get_supplier->mailing_address}}" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Permanent Address</label>
	    		    <input type="text" name="permanent_address" value="{{$get_supplier->permanent_address}}" class="form-control">
	    		</div>

	    		<div class="form-group">
	    		    <input type="submit" name="submit" class="btn btn-success" value="EDIT">
	    		</div>
	    	</form>
	    </div> 	
	</div>	
</div>

<script>
	$(document).ready(function() {
	    $('#summernote').summernote();
	});
</script>

@endsection
