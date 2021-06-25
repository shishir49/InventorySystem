@extends('layout.admin_layout')

@section('admin_content')

<div class="editproduct">
    <!-- EDIT / UPDATE /DELETE / VIEW-->

	<div class="admin_sidebar">
	    <p class="d_title">Dashboard</p>

	    <div class="admin_menu_items">
	    	<a href="">General</a>
	        <a href="{{'../categories'}}">Categories</a>
	        <a href="{{'../products'}}">Products</a>
	        <a href="{{'../add-product'}}">Add Product</a>
            <a href="">Sliders</a>
	        <a href="">All Orders</a>
	    </div> 	

	</div>
	<div class="dashboard_action">
	    <div class="dashboard_title">
	        <p>Edit Product</p>
	    </div> 	
        <p style="text-align: center;">{{session('msg')}}</p>
	    <div class="dashboard_table">

	    	<form method="POST" action="../update-product/{{$get_product->id}}" enctype="multipart/form-data">

	        @csrf
	    		<div class="form-group">
	    			<label>Product Name</label>
	    		    <input type="text" name="product_name" value="{{$get_product->product_name}}" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Category</label>
	    			<select name="category_id" class="form-control">
	    				<option value="{{$get_product->category_id}}">{{$get_product->category_id}}</option>
	    				@foreach($get_cat as $cats)
	    				<option value="{{$cats->id}}">{{$cats->category_name}}</option>
	    				@endforeach
	    			</select>
	    		</div>
	    		<div class="form-group">
	    			<label>Product Image</label>
	    			<input type="hidden" name="default" value="{{$get_product->image}}" class="form-control">
	    			<div class="im" style="width: 50px">
	    				<img src="../../uploads/{{$get_product->image}}" style="width: 100%;">
	    			</div>
	    		    <input type="file" name="image" placeholder="{{$get_product->image}}" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Product Price</label>
	    		    <input type="text" name="product_price" value="{{$get_product->product_price}}" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Product Description</label>
	    			<textarea id="summernote" name="product_description">{{$get_product->product_description}}</textarea>
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
