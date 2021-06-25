<div class="admin_sidebar">
    <p class="d_title">Dashboard</p>

   @include('layout.side_bar')  

</div>
<div class="dashboard_action">
    <div class="admin_welcome">
       <h1>Welcome Home ! </h1>
    </div>  

    <div class="admin_info">
        <div class="admin_panel_info_card">
            <h3>Total Categories : {{count($c)}}</h3>
        </div>

        <div class="admin_panel_info_card">
            <h3>Total Products : {{count($p)}}</h3>
        </div>

        <div class="admin_panel_info_card">
            <h3>Total Import: {{count($s)}}</h3>
        </div>

        
    </div>
      
</div>  


   