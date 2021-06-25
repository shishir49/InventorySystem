@extends('layout.admin_layout')

@section('admin_content')

<div class="categories">
    <!-- EDIT / UPDATE /DELETE / VIEW-->

	<div class="admin_sidebar">
	    <p class="d_title">Dashboard</p>

	    @include('layout.side_bar')	

	</div>
	<div class="dashboard_action">
		<p style="text-align: center;">{{session('msg')}}</p>
	    <div class="dashboard_title">
	        <p>Categories</p>
	    </div> 	

	    <div class="dashboard_table">
	    	<div class="filter" style="padding:1%;border:1px solid gray;margin-bottom: 1%;background: #e2e6e6;">
	    		<table width="100%">
		    		<form action="/admin/categories" method="GET">
		    			@csrf
		    			<tr>
			    			<td><input type="text" class="form-control" name="category_name" placeholder="Category Name"></td>
				    		<td><input type="submit" class="btn btn-success btn-md" name="search" id="btnSearch" value="Search"></td>
		    		    </tr>
		    		</form>
	    	    </table>
	    	</div>
	        <table id="customers">
	        	<tr>
	        		<th>ID</th>
	        		<th>Category Name</th>
	        		<th>Category Image</th>
	        		<th>Action</th>
	        	</tr>
	        	@if (count($cats)<1)
					<tr>
						<td colspan="5">No Product Found</td>
					</tr>
				@else	
		        	@foreach ($cats as $cat)
	        	<tr>
	        		<td>{{$loop->iteration}}</td>
	        		<td><img src="../uploads/{{$cat->image}}" style="width:60px;" alt="no image found" /></td>
	        		<td>{{$cat->category_name}}</td>
	        		<td>
	        			<a class="edit" href="edit-category/{{$cat->id}}">Edit</a>
			        	<a class="delete" href="cat-delete/{{$cat->id}}">Delete</a>
	        		</td>
	        	</tr>
	        	@endforeach
                @endif
	        </table>
	    </div> 	
	</div>	
</div>

@endsection
