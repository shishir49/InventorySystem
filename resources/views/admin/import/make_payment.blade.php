@extends('layout.admin_layout')

@section('admin_content')

<div class="addproduct">
    <!-- EDIT / UPDATE /DELETE / VIEW-->

	<div class="admin_sidebar">
	    <p class="d_title">Dashboard</p>

	    <div class="admin_menu_items">
	    	<a href="">General</a>
	        <a href="{{'categories'}}">Categories</a>
	        <a href="{{'products'}}">Products</a>
	        <a href="{{'add-product'}}">Add Product</a>
	        <a href="{{'suppliers'}}">Suppliers</a>
	        <a href="{{'add-supply'}}" style="background: #91a779;">Add supply</a>
	        <a href="{{'sell'}}">Sell</a>
            <a href="">Sliders</a>
	        <a href="">All Orders</a>
	    </div> 	

	</div>
	<div class="dashboard_action">
	    <div class="dashboard_title">
	        <p>Add Supply</p>
	    </div> 	

	    <div class="dashboard_table">

	    	<form method="POST" action="../admin/submit-product" enctype="multipart/form-data">

	        @csrf
	        		
	    	    <table width="100%">
	    	    	<tr>
	    	    		<td>Supplier's Name</td>
	    	    		<td>K.S.Azim</td>
	    	    	</tr>
	    	    	<tr>
	    	    		<td>Supplier's Contact Info</td>
	    	    		<td>801781410322</td>
	    	    	</tr>
	    	    	<tr>
	    	    		<td>Supplier's Contact Address</td>
	    	    		<td>Uttara,Dhaka</td>
	    	    	</tr>
	    	    </table>
	    	    <table width="100%">
	    	    	<tr>
	    	    		<th>Item Name</th>
	    	    		<th>size</th>
	    	    		<th>Rate</th>
	    	    		<th>Net Amount</th>
	    	    	</tr>
	    	    	<tr>
	    	    		<td>Rice</td>
	    	    		<td>10kg</td>
	    	    		<td>65</td>
	    	    		<td>650</td>
	    	    	</tr>
	    	    	<tr>
	    	    		<td>Potato</td>
	    	    		<td>10kg</td>
	    	    		<td>40</td>
	    	    		<td>400</td>
	    	    	</tr>
	    	    </table>
	    		<div class="form-group">
	    		    <input type="submit" name="submit" class="btn btn-danger" value="Back">
	    		    <input type="submit" name="submit" class="btn btn-success" value="Make Payment">
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
