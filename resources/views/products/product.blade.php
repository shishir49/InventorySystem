@extends('layout.master')

@section('content')

<div class="content">
     
    <div class="section_title" style="border-bottom:1px solid #eee;">
        <h1 style="text-align:center;color:#474a4a">Product Name</h1>
    </div>  

    <div class="content_body">  

        <div class="content_description">
              <div class="product_image">
                  <!-- <img src="images/product.jpg"/> -->
                  <img :src=""/>
                  <h1>Product Image</h1>

              </div>    
              <div class="product_description">
                  <div class="product_short_info">
                        <h2 style="border:1px solid #eee;padding:1%;">Price : 500 BDT</h2>
                   </div>
                   <div class="product_des" v-html="singleProduct.product_description" style="border:1px solid #eee;padding:1%;margin-top:1%;margin-bottom:1%;">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                       quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                       consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                       cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                   </div>        
                   <div class="place_order" style="border:1px solid #eee;padding:1%;">
                      <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal" id="open">Order This Product</button>				
                   </div>
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
              <input type="text" class="form-control" name="name" id="name">
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
   
@endsection
