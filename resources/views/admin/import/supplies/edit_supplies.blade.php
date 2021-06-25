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
	        <p>Edit Supply Info</p>
	    </div> 	
        <p style="text-align: center;">{{session('msg')}}</p>
	    <div class="dashboard_table">

	    	<form method="POST" action="../update-supply/{{$get_supplies->id}}" enctype="multipart/form-data">

	        @csrf
	    		<div class="form-group">
	    			<label>Supplier's Name</label>
	    		    <input type="text" name="supplier_name" value="{{$supplier_name->supplier_name}}" class="form-control">
	    		    <input type="hidden" name="supplier_id" value="{{$supplier_name->id}}" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Item Name</label>
	    		    <input type="text" name="item_details" value="{{$get_supplies->item_details}}" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Rate</label>
	    		    <input type="text" name="rate" value="{{$get_supplies->rate}}" class="form-control r" id="r">
	    		</div>
	    		<div class="form-group">
	    			<label>Quantity</label>
	    		    <input type="text" name="quantity" value="{{$get_supplies->quantity}}" class="form-control q" id="q">
	    		</div>
	    		<div class="form-group">
	    			<label>Total Cost</label>
	    		    <input type="text" name="total_cost" value="{{$get_supplies->total_cost}}" id="total_cost" class="form-control total_cost">
	    		</div>

	    		<div class="form-group">
	    			<label>Paid</label>
	    		    <input type="text" name="paying" value="{{$get_supplies->paying}}" id="paying" class="form-control paying">
	    		</div>
                
	    		<div class="form-group">
	    			<label>Due</label>
	    		    <input type="text" name="due" value="{{$get_supplies->due}}" class="form-control due" id="due">
	    		</div>
	    		
                <div class="form-group">
	    			<select class="form-control" name="status">
	    				<option value="1">Active</option>
	    				<option value="0">Inactive</option>
	    			</select>
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

<script type="text/javascript">
    	$( document ).ready(function() {
    		$('input.q').keyup(function(){   
		        var q = $("#q").val();
		        var r = $("#r").val();
		        var total_cost = $("#total_cost").val();
		        total_cost = (parseFloat(q) * parseFloat(r));
		        $("#total_cost").val(parseFloat(total_cost));
	       });
    		$('input.r').keyup(function(){   
		        var q = $("#q").val();
		        var r = $("#r").val();
		        var total_cost = $("#total_cost").val();
		        total_cost = (parseFloat(q) * parseFloat(r));
		        $("#total_cost").val(parseFloat(total_cost));
	       });
	        $('input.paying').keyup(function(){ 
	            var total_cost = $("#total_cost").val();
		        var paying = $("#paying").val();
		        var due = $("#due").val();
                
		        due = (parseFloat(total_cost) - parseFloat(paying));
		        $("#due").val(parseFloat(due));
	       });
	    });
    </script>

@endsection
