@extends('layout.master')

@section('content')

<div class="content">
     
    <div class="section_title" style="border-bottom:1px solid #eee;">
        <h1 style="text-align:center;color:#474a4a">{{$single_product->product_name}}</h1>
    </div>  

    <div class="content_body">  

        <div class="content_description">
              <div class="product_image">
                  <img src="../uploads/{{$single_product->image}}" style="width:100%;" alt="no image found" />
              </div>    
              <div class="product_description">
                  <div class="product_short_info">
                        <h2 style="border:1px solid #eee;padding:1%;">Price : {{$single_product->product_price}}  BDT</h2>
                   </div>
                   <div class="product_des" style="border:1px solid #eee;padding:1%;margin-top:1%;margin-bottom:1%;">
                       {!! $single_product->product_description !!}
                   </div>        
                  {{-- <div class="place_order" style="border:1px solid #eee;padding:1%;">
                      <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal" id="open">Order This Product</button>	--}}
                      {{-- <select id="mySelect" onchange="myFunction()">
                          <option value="a">a</option>
                          <option value="b">b</option>
                      </select>
                      session : {{Session::get('currency_code')}}
                      @if(Session::get('currency_code')=='b')
                        'hi';
                      @else
                        'bye' ; 
                      @endif  
                      <p id="demo"></p>
                      <button class="btn btn-danger" id="mySelect" value="10">Add To Cart</button>		
                   </div>--}}
              </div>          
        </div>   
    </div>

    <!-- Modal -->
  <div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="alert alert-danger" style="display:none"></div>
      <div class="modal-header">
        
        <h5 class="modal-title">Uefa Champion League</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-4">
              <label for="Name">Name:</label>
              <input type="text" class="form-control" value="{{$single_product->product_name}}" name="name" id="name">
            </div>
          </div>
          <div class="row">
              <div class="form-group col-md-4">
                <label for="Club">Club:</label>
                <input type="text" class="form-control" name="club" id="club">
              </div>
          </div>
          <div class="row">
             <div class="form-group col-md-4">
                <label for="Country">Country:</label>
                <input type="text" class="form-control" name="country" id="country">
              </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="Goal Score">Goal Score:</label>
              <input type="text" class="form-control" name="score" id="score">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  class="btn btn-success" id="ajaxSubmit">Save changes</button>
        </div>
    </div>
  </div>
</div>
   

<script type="text/javascript">
   function myFunction() {
          var x = document.getElementById("mySelect").value;
          sessionStorage.setItem("currency_code", x);
          document.getElementById("demo").innerHTML = "You selected: " + x;
        }
</script>   
@endsection
