@extends('layout.master')

@section('content')

<div class="our_products">
    <div class="page_title">
	    <h2>Our Products</h2>
	</div>

	<div class="side_bar">
		 <div class="quick_search">
		 	<h5>Quick Search</h5>
		 	<form>
		 		<input type="text" name="search" class="form-control search">
		 	</form>
		 </div>
	     <div class="search_by_cat">
		     <h5>Search By Category</h5>
		     <div class="category_list">
		     	<span id="buttons" class="buttons">All</span>
	        	@foreach ($category as $cate)
	        	<span id="buttons" class="buttons">{{$cate->category_name}}</span>
	        	@endforeach
		     </div> 
	     </div>

	     <h5 style="padding-left: 8%">Total : <span id="total_records"></span> Products</h5> 	     	
	</div>

	<div class="product_list">
		
	</div>
	<div class="d-flex justify-content-center" style="width:100%;float:left;">{!! $products->links() !!} </div>
	 
</div>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('.product_list').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '.search', function(){
  $('span').removeClass("single_cat");
  var query = $(this).val();
  fetch_customer_data(query);
 });

 $(document).on('click', '#buttons', function(){
  $('input[name=search').val('');
  var query = $(this).html();
  console.log(query);
  fetch_customer_data(query);
 });

 $(document).on('click', '#buttons', function(){
       $('span').removeClass("single_cat");
       $(this).addClass("single_cat");
 });

});
</script>


@endsection
