
<div class="admin_login_panel">
    <div class="d-flex justify-content-center">
        
        <div class="login_panel">
             <div class="admin_welcome">
                <h2 style="text-align: center;">Admin Registration</h2>
             </div>  
             <form method="POST" action="registration">
                 @csrf

                 <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                 </div>
                 <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control">
                 </div>
                 <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="user_name" class="form-control">
                 </div> 
                 <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                 </div>
                 <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Login">
                 </div>
             </form>
        </div>
    </div>
      
</div>  


   