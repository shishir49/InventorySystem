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
            <p>Add Category</p>
        </div>  
        <div class="msg"></div>
        <div class="dashboard_table">

            <form method="POST" action="{{route('add-category')}}" enctype="multipart/form-data" id="add_cate">

            @csrf
                    
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="category_name" class="form-control" id="category_name">
                </div>
                <div class="form-group">
                    <label>Category Image</label>
                    <input multiple="multiple" type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" id="add_cat" value="ADD">
                </div>
            </form>
        </div>  

        <div class="ex_api">
             <button class="btn btn-primary" id="gu">Get Git Hub Users</button>

             <div class="gusers" id="gusers">
             </div>
        </div>
    </div>  
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>

<script type="text/javascript">
    document.getElementById('gu').addEventListener('mouseover',loadusers);
    
    function loadusers(){
        var xhr = new XMLHttpRequest();
        xhr.open('GET','https://api.github.com/users',true);

        xhr.onload = function(){
            if(this.status==200){
                var users = JSON.parse(this.responseText);
                 
                var output = '';

                for(var i in users){
                   output += '<div class="user">'+'<img style="float:left;margin:2px;" src="'+users[i].avatar_url+'" width="70" height="70">'+'</div>';

                }

                document.getElementById('gusers').innerHTML = output;
            }
        }

        xhr.send();
    }
</script>



@endsection
