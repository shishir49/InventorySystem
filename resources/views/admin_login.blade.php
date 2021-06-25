
<div class="admin_login_panel">
    <div class="d-flex justify-content-center">
        
        <div class="login_panel">
             <div class="admin_welcome">
                <h2 style="text-align: center;">Admin Login</h2>
             </div>  
             <p class="message" style="color:red">{{session('error')}}</p>
             <form method="POST" action="login">
                 @csrf
 
                 <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                 </div>
                 <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                 </div>
                 <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Login">
                 </div>
                 <div class="form-group">
                    <label>User Name : ks.azim@yahoo.com</label><br>
                    <label>Password : admin1</label>

                 </div>
             </form>
        </div>
    </div>
      
</div>  


   