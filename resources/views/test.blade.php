<!DOCTYPE html>
<html>
 <head>
  <title>Live search in laravel using AJAX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">

     

     .buttons{
      padding: 2%;
      background: #eee;
      cursor: pointer;
     }

     .buttons_change{
      background: red;
      color: white;
     }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Live search in laravel using AJAX</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Customer Data</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control search" placeholder="Search Customer Data" /><br>
      <span id="buttons" class="buttons">All</span>
      @foreach($cat as $cats)
      <span id="buttons" class="buttons" value="Product DC">{{$cats->category_name}}</span>
      @endforeach

     </div>
     {{-- <div class="table-responsive">
      <h3 align="center">Total Data : <span id="total_records"></span></h3>
     <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Customer Name</th>
         <th>Address</th>
         <th>City</th>
         <th>Postal Code</th>
         <th>Country</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table> 
     </div>--}}
 
     <div class="">
         <h3 align="center">Total Data : <span id="total_records"></span></h3>

         <div id="tbody">

         </div>
     </div>


    </div>    
   </div>
  </div>
 </body>
</html>

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
    $('#tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '.search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });

 $(document).on('click', '#buttons', function(){
  var query = $(this).html();
  fetch_customer_data(query);
 });

 $(document).on('click', '#buttons', function(){
       $('span').removeClass("buttons_change");
       $(this).addClass("buttons_change");
 });

});
</script>