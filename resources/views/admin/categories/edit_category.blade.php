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
	        <p>Edit Category</p>
	    </div> 	
        <p style="text-align: center;">{{session('msg')}}</p>
	    <div class="dashboard_table">

	    	<form method="POST" action="../update-category/{{$get_category->id}}" enctype="multipart/form-data">

	        @csrf
	    		<div class="form-group">
	    			<label>Category Name</label>
	    		    <input type="text" name="category_name" value="{{$get_category->category_name}}" class="form-control">
	    		</div>
	    		
	    		<div class="form-group">
	    			<label>Category Image</label>
	    			<input type="hidden" name="default" value="{{$get_category->image}}" class="form-control">
	    			<div class="im" style="width: 50px">
	    				<img src="../../uploads/{{$get_category->image}}" style="width: 100%;">
	    			</div>
	    		    <input type="file" name="image" placeholder="{{$get_category->image}}" class="form-control">
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
