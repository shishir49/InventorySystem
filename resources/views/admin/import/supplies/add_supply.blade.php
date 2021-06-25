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
	        <p>Add A Supply</p>
	    </div> 	

	    <div class="dashboard_table">

	    	<form method="POST" action="../import/add-supply" enctype="multipart/form-data">

	        @csrf
	        		
	    		<div class="form-group">
	    			<label>Supplier Name</label>
	    			<select class="form-control supplier_name" name="supplier_name">
	    				@foreach($get_supplier as $gs)
	    				<option value="{{$gs->id}}">{{$gs->supplier_name}}</option>
	    				 @endforeach
	    			</select>
	    		</div>
	    		
	    		<div class="form-group">
	    			<h4>Supplied Poducts</h4>
	    			<table width="100%" id="suplly">
	    				<tr>
	    					<th>Item Name</th>
	    					<th>Rate</th>
	    					<th>Item Quantity</th>
	    					<th>Amount</th>
	    					
	    				</tr>
	    				<tr>
	    					<td><input type="text" name="item_name" value="" id="item_name" class="form-control"></td>
	    					<td><input type="text" name="rate" value="" id="rate" class="form-control net_amount"></td>
	    					<td><input type="text" name="quantity" value="" id="quantity" class="form-control net_amount"></td>
	    					<td><input type="text" name="amount" value="" id="amount" class="form-control"></td>
	    					
	    				</tr>
	    			</table>
	    			
	    			{{-- <select name="category_id" class="form-control">
	    				@foreach($cat as $cats)
	    				<option value="{{$cats->id}}">{{$cats->category_name}}</option>
	    				@endforeach
	    			</select> --}}
	    		</div>
	    		<div class="form-group">
	    			<label>Gross Amount</label>
	    		    <input type="text" name="gross" id="gross" class="form-control count_due">
	    		</div>

	    		<div class="form-group">
	    			<label>Paying Amount</label>
	    		    <input type="text" name="paying" id="paying" class="form-control count_due">
	    		</div>

	    		<div class="form-group">
	    			<label>Due</label>
	    		    <input type="text" name="due" id="due" class="form-control">
	    		</div>

	    		<div class="form-group">
	    		    <input type="submit" name="submit" class="btn btn-primary" value="Save">
	    		    <!-- <input type="submit" name="submit" class="btn btn-success" value="Make Payment"> -->
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
	$(document).ready(function() {
       $("#add_row").unbind('click').bind('click', function() {
      var table = $("#suplly");
      var count_table_tbody_tr = $("#suplly tr").length;
      var row_id = count_table_tbody_tr + 1;

      $.ajax({
          url: base_url + '/orders/getTableProductRow/',
          type: 'post',
          dataType: 'json',
          success:function(response) {
            

              // console.log(reponse.x);
               var html = '<tr id="row_'+row_id+'">'+
                   '<td>'+ 
                    '<select class="form-control select_group product" data-row-id="'+row_id+'" id="product_'+row_id+'" name="product[]" style="width:100%;" onchange="getProductData('+row_id+')">'+
                        '<option value=""></option>';
                        $.each(response, function(index, value) {
                          html += '<option value="'+value.id+'">'+value.name+'</option>';             
                        });
                        
                      html += '</select>'+
                    '</td>'+ 
                    '<td><input type="number" name="qty[]" id="qty_'+row_id+'" class="form-control" onkeyup="getTotal('+row_id+')"></td>'+
                    '<td><input type="text" name="rate[]" id="rate_'+row_id+'" class="form-control" disabled><input type="hidden" name="rate_value[]" id="rate_value_'+row_id+'" class="form-control"></td>'+
                    '<td><input type="text" name="amount[]" id="amount_'+row_id+'" class="form-control" disabled><input type="hidden" name="amount_value[]" id="amount_value_'+row_id+'" class="form-control"></td>'+
                    '<td><button type="button" class="btn btn-default" onclick="removeRow(\''+row_id+'\')"><i class="fa fa-close"></i></button></td>'+
                    '</tr>';

                if(count_table_tbody_tr >= 1) {
                $("#suplly tr:last").after(html);  
              }
              else {
                $("#suplly").html(html);
              }

              $(".product").select2();

          }
        });

      return false;
    });
	});	
</script>

<script type="text/javascript">
    	$( document ).ready(function() {
	        $('input.count_due').keyup(function(){   
		        var gross = $("#gross").val();
		        var paying = $("#paying").val();
		        var due = $("#due").val();
		        due = (parseFloat(gross) - parseFloat(paying));
		        $("#due").val(parseFloat(due));
	       });

	        $('input.net_amount').keyup(function(){   
		        var rate = $("#rate").val();
		        var quantity = $("#quantity").val();
		        var amount = $("#amount").val();
		        amount = (parseFloat(rate) * parseFloat(quantity));
		        $("#amount").val(parseFloat(amount));
		        $("#gross").val(parseFloat(amount));
	       });
	    });
    </script>
@endsection
