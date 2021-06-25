@extends('layout.admin_layout')

@section('admin_content')

<div class="addproduct">
    <!-- EDIT / UPDATE /DELETE / VIEW-->

	<div class="admin_sidebar">
	    <p class="d_title">Dashboard</p>

	    @include('layout.side_bar')
	</div>
	<div class="dashboard_action">
	    <div class="dashboard_title">
	        <p>Add Product</p>
	    </div> 	

	    <div class="dashboard_table">

	    	<form method="POST" action="../admin/submit-product" enctype="multipart/form-data">

	        @csrf
	        		
	    		<div class="form-group">
	    			<label>Product Name</label>
	    		    <input type="text" name="product_name" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Category</label>
	    			<select name="category_id" class="form-control">
	    				@foreach($cat as $cats)
	    				<option value="{{$cats->id}}">{{$cats->category_name}}</option>
	    				@endforeach
	    			</select>
	    		</div>
	    		<div class="form-group">
	    			<label>Product Image</label>
	    		    <input multiple="multiple" type="file" name="image" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Product Price</label>
	    		    <input type="text" name="product_price" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Product Description</label>
	    			<textarea id="summernote" name="product_description"></textarea>
	    		    <!-- <input type="text" name="product_description" class="form-control"> -->
	    		</div>
	    		<div class="form-group">
	    		    <input type="submit" name="submit" class="btn btn-success" value="ADD">
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
