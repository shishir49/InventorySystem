<!DOCTYPE html>
<html>
 <head>
  <title>Laravel Pagination using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Laravel Pagination using Ajax</h3><br />
   <form>
     <input type="text" name="search" class="fomr-control search">
   </form>
   <div id="table_data">
        @include('testAjaxAction')
   </div>
   <input type="text" name="hidden_page" id="hidden_page" value="1">
   <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
  </div>

<script>
$(document).ready(function(){

 // $(document).on('click', '.pagination a', function(event){
 //  event.preventDefault(); 
 //  var page = $(this).attr('href').split('page=')[1];
 //  fetch_data(page);
 // });

 function fetch_data(page,query){
  $.ajax({
   url:"testAjax/testAjaxAction?page="+page+"&query="+query,
   success:function(data)
   {
    $('#table_data').html('');
    $('#table_data').html(data);
   }
  });
 }

 // fetch_product();

 // function fetch_product(query = ''){
 //  $.ajax({
 //   url:"testAjax/testAjaxAction",
 //   method:'GET',
 //   data:{query:query},
 //   dataType:'json',
 //   success:function(data)
 //   {
 //    $('#table_data').html(data);
 //   }
 //  })
 // }

 $(document).on('keyup', '.search', function(){
  var query = $(this).val();
  var column_name = $('#hidden_column_name').val();
  console.log(query);
  var page = $('#hidden_page').val();
  fetch_data(page, query);
 });


  $(document).on('click', '.pagination a', function(event){
  event.preventDefault();
  var page = $(this).attr('href').split('page=')[1];
  $('#hidden_page').val(page);
  var column_name = $('#hidden_column_name').val();
  var query = $('.serach').val();

  $('li').removeClass('active');
  $(this).parent().addClass('active');
  fetch_data(page,query);
 });
 
});
</script> 
 </body>
</html>

 

