<div class="col-md-4">
          <?php 
            if (!isset($_SESSION['type']))
            {
           ?>
        <div class="login-form">
            <!-- login form-->
    <form action="layout/login.php" method="post">
        <div class="form-group">
          <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
        </div>
    <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i> </span>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
        </div>        
        <div class="form-group">
            <button type="submit" name="login" class="btn btn-success btn-block login-btn">Sign in</button>
        </div>
        
    </form>

 <?php 
            }
            else
            {
              $success_login_id = $_SESSION['id'];
              $success_login_name_admin = $_SESSION['name'];
              $success_login_username_admin = $_SESSION['username'];
              $success_login_email_admin = $_SESSION['email'];
              $success_login_type_password_admin = $_SESSION['password'];
              $success_login_gender_admin = $_SESSION['gender'];
              $success_login_image_admin = $_SESSION['image'];
              $success_login_status_admin = $_SESSION['status'];
              $success_login_type_admin = $_SESSION['type'];
              
           ?>
<div class="card my-4">
        <div class="card-header">
          <p align="center"><img  class="zoom3" src="admin/images/users/<?php echo $success_login_image_admin; ?>" width="110"></p>
          <p align="center"><b>Welcome <?php echo $success_login_name_admin; ?></b></p>
        </div>
        <div class="card-header">
          
          <!-- Status -->
          <p align="center">
            <?php 
              if ($_SESSION['type'] =='1')
              {
               

             ?>
          <a href="admin/" class="btn btn-default btn-flat" target="_blank">Administration</a>
          <?php
           }
           else
            {

           ?>
           <a href="profil.php/" class="btn btn-default btn-flat">Profil</a>
           <?php } ?>
          <a href="layout/logout.php" class="btn btn-default btn-flat">Sign out</a></p>
        </div>
      </div>
      <?php 
            }
          ?>
   


   </div>