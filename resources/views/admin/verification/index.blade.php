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
	        <p>Verification Requests</p>
	    </div> 	

	    <div class="dashboard_table">
	    	
	        <table id="customers">
	        	<tr>
	        		<th width="10%">ID</th>
	        		<th width="40%">Image</th>
	        		<th width="30%">Member Id</th>
	        		<th width="20%">Action</th>
	        	</tr>
	        	@if (count($getAll)<1)
					<tr>
						<td colspan="5">No Request Found</td>
					</tr>
				@else	
		        	@foreach ($getAll as $product)
						<tr>
						    <td>{{$loop->iteration}}</td>
			        		<td><img src="../uploads/{{$product->image}}" style="width:60px;" alt="no image found" /></td>
			        		<td>{{$product->user_id}}</td>
			        		<td>
			        			<a class="edit" href="">Edit</a>
			        			<a class="delete" href="">Delete</a>
			        		</td>
			        	</tr>
		        	@endforeach
                @endif
	        </table>

	         <div class="d-flex justify-content-center" style="margin-top: 1%">{!! $getAll->links() !!} </div> 
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
