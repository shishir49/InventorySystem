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
	        <p>Supplies</p>
	    </div> 	

	    <div class="dashboard_table">
	    	<div class="filter" style="padding:1%;border:1px solid gray;margin-bottom: 1%;background: #e2e6e6;">
	    		<table width="100%">
		    		<form action="" method="GET">
		    			@csrf
		    			<tr>
			    			<td><input type="text" class="form-control" name="supplier_name" placeholder="Supplier Id">
			    			</td>
			    			
				    		<td><input type="submit" class="btn btn-success btn-md" name="" value="Search"></td>
		    		    </tr>
		    		</form>
	    	    </table>
	    	</div>
	        <table id="customers">
	        	<tr>
	        		<th width="5%">ID</th>
	        		<th width="10%">Supplier Name</th>
	        		<th width="10%">Item Name</th>
	        		<th width="10%">Rate</th>
	        		<th width="10%">Quantity</th>
	        		<th width="10%">Total Cost</th>
	        		<th width="10%">Paid</th>
	        		<th width="10%">Status</th>
	        		<th width="10%">Date</th>
	        		<th width="5%">Action</th>
	        	</tr>
	        	@if (count($supplies)<1)
					<tr>
						<td colspan="5">No Product Found</td>
					</tr>
				@else	
		        	@foreach ($supplies as $supply)
						<tr>
						    <td>#{{$supply->supplier_id}}</td>
			        		<td>{{$supply->suppliers->supplier_name}}</td>
			        		<td>{{$supply->item_details}}</td>
			        		<td>{{$supply->rate}}</td>
			        		<td>{{$supply->quantity}}</td>
			        		<td>{{$supply->total_cost}}</td>
			        		<td>{{$supply->paying}}</td>
			        		<td>
			        			@if($supply->due ==0)
			        			   <button class="btn btn-success btn-sm">paid</button> 
			        			@else
			        			   <p style="color: red">Due {{$supply->due}}</p> 
			        			@endif   
			        		</td>
			        		<td>{{$supply->created_at}}</td>
			        		<td>
			        			<a class="edit" href="update-supply/{{$supply->id}}">Edit</a>
			        			<a class="delete" href="sdelete/{{$supply->id}}">Delete</a>
			        			{{-- <a class="delete" href="{{route('create-pdf')}}">Print</a> --}}
			        		</td>
			        	</tr>
		        	@endforeach
                @endif
	        </table>

	         <div class="d-flex justify-content-center" style="margin-top: 1%">{!! $supplies->links() !!} </div> 
	    </div> 	
	</div>	
</div>


@endsection
