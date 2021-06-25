@extends('layout.admin_layout')

@section('admin_content')

<div class="products">
    <!-- EDIT / UPDATE /DELETE / VIEW-->

	<div class="admin_sidebar">
	    <p class="d_title">Dashboard</p>

	    
	    @include('layout.side_bar')

	</div>

	<div class="dashboard_action">
		<p style="text-align: center;">{{session('msg')}}</p>
	    <div class="dashboard_title">
	        <p>Products</p>
	    </div> 	

	    <div class="dashboard_table">
	    	<div class="filter" style="padding:1%;border:1px solid gray;margin-bottom: 1%;background: #e2e6e6;">
	    		<table width="100%">
		    		<form action="/admin/products" method="GET">
		    			@csrf
		    			<tr>
			    			{{-- <td>
			    				<select class="form-control" name="category_name">
			    				    <option>Category</option>
			    				    @foreach ($prod as $cat)
                                        <option name="category_name" value="{{$cat->category_id}}">{{$cat->categories->category_name}}</option>
			    				    @endforeach
				    			</select>
				    		</td> --}}
			    			<td><input type="text" class="form-control" name="product_name" placeholder="Product Name"></td>
			    			<td></td>
				    		{{-- <td>
				    			<select class="form-control">
			    				    <option>From</option>
				    			</select>
				    		</td>
				    		<td>	
				    			<select class="form-control">
			    				    <option>To</option>
				    			</select>
		                       
				    		</td> --}}
				    		<td><input type="submit" class="btn btn-success btn-md" name="search" id="btnSearch" value="Search"></td>
		    		    </tr>
		    		</form>
	    	    </table>
	    	</div>
	        <table id="customers">
	        	<tr>
	        		<th width="5%">ID</th>
	        		<th width="15%">Product Image</th>
	        		<th width="30%">Product Name</th>
	        		<th width="30%">Category Name</th>
	        		<th width="20%">Action</th>
	        	</tr>
	        	@if (count($prod)<1)
					<tr>
						<td colspan="5">No Product Found</td>
					</tr>
				@else	
		        	@foreach ($prod as $product)
						<tr>
						    <td>{{$loop->iteration}}</td>
			        		<td><img src="../uploads/{{$product->image}}" style="width:60px;" alt="no image found" /></td>
			        		<td>{{$product->product_name}}</td>
			        		<td>{{$product->categories->category_name}}</td>
			        		<td>
			        			<a class="edit" href="edit-product/{{$product->id}}">Edit</a>
			        			<a class="delete" href="delete/{{$product->id}}">Delete</a>
			        		</td>
			        	</tr>
		        	@endforeach
                @endif
	        </table>

	         <div class="d-flex justify-content-center" style="margin-top: 1%">{!! $prod->links() !!} </div> 
	    </div> 	
	</div>	
</div>

<script type='text/javascript'>
$(document).ready(function(){
// Fetch all records
	$('#fetchAllRecord').click(function(){
	fetchRecords(0);
	});
	// Search by userid
	$('#btnSearch').click(function(){
	    var userid = Number($('#search').val().trim());
		if(userid > 0){
		fetchRecords(userid);
		}
	});
});
function fetchRecords(id){
	$.ajax({
		url: 'getData/'+id,
		type: 'get',
		dataType: 'json',
		success: function(response){
			var len = 0;
			$('#userTable tbody').empty(); // Empty <tbody>
			if(response['data'] != null){
			   len = response['data'].length;
			}
			if(len > 0){
				for(var i=0; i<len; i++){
					var id = response['data'][i].id;
					var username = response['data'][i].username;
					var name = response['data'][i].name;
					var email = response['data'][i].email;
					var tr_str = "<tr>" +
					"<td align='center'>" + (i+1) + "</td>" +
					"<td align='center'>" + username + "</td>" +
					"<td align='center'>" + name + "</td>" +
					"<td align='center'>" + email + "</td>" +
					"</tr>";
					$("#userTable tbody").append(tr_str);
				}
			}else if(response['data'] != null){
				var tr_str = "<tr>" +
				"<td align='center'>1</td>" +
				"<td align='center'>" + response['data'].username + "</td>" + 
				"<td align='center'>" + response['data'].name + "</td>" +
				"<td align='center'>" + response['data'].email + "</td>" +
				"</tr>";
				$("#userTable tbody").append(tr_str);
			}else{
				var tr_str = "<tr>" +
				"<td align='center' colspan='4'>No record found.</td>" +
				"</tr>";
				$("#userTable tbody").append(tr_str);
			}
		}
	});
}
</script>

@endsection
