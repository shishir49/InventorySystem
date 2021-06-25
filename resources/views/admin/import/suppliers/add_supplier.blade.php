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
	        <p>Add Supplier</p>
	    </div> 	

	    <div class="dashboard_table">

	    	<form method="POST" action="{{route('add-supplier')}}" enctype="multipart/form-data">

	        @csrf
	        		
	    		<div class="form-group">
	    			<label>Supplier Name</label>
	    			<input type="text" name="supplier_name" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Supplier's Phone/Mobile Number</label>
	    		    <input type="text" name="phone" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Supplier's Email Address</label>
	    		    <input type="text" name="email" class="form-control">
	    		</div>
	    		<div class="form-group">
	    			<label>Supplier's Mailing Address</label>
	    		    <input type="text" name="mailing_address" class="form-control">
	    		</div>
                <div class="form-group">
	    			<label>Supplier's Permanent Address</label>
	    		    <input type="text" name="permanent_address" class="form-control">
	    		</div>
	    		<div class="form-group">
	    		    <input type="submit" name="submit" class="btn btn-success" value="Add">
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

@endsection
