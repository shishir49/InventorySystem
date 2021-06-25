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
	        <p>Suppliers</p>
	    </div> 	

	    <div class="dashboard_table">
	    	
	    	<div class="filter" style="padding:1%;border:1px solid gray;margin-bottom: 1%;background: #e2e6e6;">
	    		<table width="100%">
		    		<form action="/admin/import/suppliers" method="GET">
		    			@csrf
		    			<tr>
			    			<td><input type="text" class="form-control" name="supplier_name" placeholder="Supplier Name"></td>
				    		<td><input type="submit" class="btn btn-success btn-md" name="search" id="btnSearch" value="Search"></td>
		    		    </tr>
		    		</form>
	    	    </table>
	    	</div>
	        <table id="customers">
	        	<tr>
	        		<th width="5%">ID</th>
	        		<th width="15%">Supplier's Name</th>
	        		<th width="10%">Supplier's Phone/Mobile</th>
	        		<th width="10%">Supplied's Email</th>
	        		<th width="20%">Mailing Address</th>
	        		<th width="20%">Permanent Address</th>
	        		<th width="20%">Action</th>
	        	</tr>
	        	@if (count($sup)<1)
					<tr>
						<td colspan="5">No Product Found</td>
					</tr>
				@else	
		        	@foreach ($sup as $sp)
						<tr>
						    <td>{{$loop->iteration}}</td>
			        		<td>{{$sp->supplier_name}}</td>
			        		<td>{{$sp->phone}}</td>
			        		<td>{{$sp->email}}</td>
			        		<td>{{$sp->mailing_address}}</td>
			        		<td>{{$sp->permanent_address}}</td>
			        		<td>
			        			<a class="edit" href="edit-supplier/{{$sp->id}}">Edit</a>
			        			<a class="delete" href="delete-supplier/{{$sp->id}}">Delete</a>
			        		</td>
			        	</tr>
		        	@endforeach
                @endif
	        </table>

	         <div class="d-flex justify-content-center" style="margin-top: 1%">{!! $sup->links() !!} </div> 
	    </div> 	
	</div>	
</div>



@endsection
