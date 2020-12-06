<header class="main-header">
    <a href="index.php" class="logo">
      <span class="logo-mini"></span>
      <span class="logo-lg">Admin panel</span>
    </a>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            <li data-toggle="modal" data-target="#InsertPost"><a href="#">
              <i class="fa fa-plus"></i><span class="hidden-xs"> Add post</span>
            </a></li>


          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/users/<?php echo $success_login_image_admin; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $success_login_name_admin; ?></span>
            </a>
            <ul class="dropdown-menu">

              <li class="user-footer">
                <div class="pull-left">
                  <button type="button" name="edit" class="btn btn-default btn-flat" data-toggle="modal" data-target="#EditUser" data-user_id_edit="<?= $success_login_id ?>" data-user_name_edit="<?= $success_login_name_admin ?>" data-user_username_edit="<?= $success_login_username_admin ?>" data-user_email_edit="<?= $success_login_email_admin ?>" data-user_image_edit="<?= $success_login_image_admin ?>" data-user_type_edit="<?= $success_login_type_admin ?>" data-user_type_edit1="<?= $success_login_type_admin ?>" data-user_gender_edit="<?= $success_login_gender_admin ?>" data-user_password_edit="<?= $success_login_type_password_admin ?>" > <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Profile</button>
                </div>
                <div class="pull-right">
                  <a href="../layout/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>