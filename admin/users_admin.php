<?php
ob_start();
include "db_connection.php";
?>
<!DOCTYPE html>
<html>
<?php include "layout/head.php"; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include "layout/header.php"; ?>
    <?php include "layout/leftsidebar.php"; ?>

    <div class="content-wrapper">


        <section class="content">
            <div class="box">
                <div class="box-header with-border">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#InsertUser"><span
                                class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add new user / admin
                    </button>

                </div>
                <div class="box-body">

                    <form action="" method="post">

                        <!-- Users table -->
                        <table class="table table-hover">
                            <tr class="info">

                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Username</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Type</th>
                                <th style="text-align: center;">Edit/Delete</th>
                            </tr>
                            <?php
                            $sql_select_users = "SELECT * FROM users ORDER BY id desc";
                            $result_sql_select_users = mysqli_query($dbconnection, $sql_select_users);
                            while ($rowusers = mysqli_fetch_assoc($result_sql_select_users))
                            {
                            $view_users_id = $rowusers['id'];
                            $view_users_name = $rowusers['name'];
                            $view_users_username = $rowusers['username'];
                            $view_users_email = $rowusers['email'];
                            $view_users_password = $rowusers['password'];
                            $view_users_gender = $rowusers['gender'];
                            $view_users_image = $rowusers['image'];
                            $view_users_status = $rowusers['status'];
                            $view_users_type = $rowusers['type'];
                            ?>
                            <tbody id="myTable">
                            <tr class="success">

                                <td style="text-align: center;"><?php echo $view_users_name ?></td>
                                <td style="text-align: center;"><?php echo $view_users_username ?></td>
                                <td style="text-align: center;"><?php echo $view_users_email ?></td>
                                <td style="text-align: center;"><img class="zoom"
                                                                     src="images/users/<?php echo $view_users_image; ?>"
                                                                     width="50"></td>
                                <?php
                                if ($view_users_status == 1) {
                                    ?>
                                    <td style="text-align: center;"><span class="label label-success">Active</span></td>
                                    <?php
                                } else {
                                    ?>
                                    <td style="text-align: center;"><span class="label label-warning">Pending</span>
                                    </td>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($view_users_type == 1) {
                                    ?>
                                    <td style="text-align: center;"><span
                                                class="label label-primary">Administrator</span></td>

                                    <?php
                                } else {
                                    ?>
                                    <td style="text-align: center;"><span class="label label-primary">User</span></td>

                                    <?php
                                }
                                ?>

                                <td style="text-align: center;">
                                    <button type="button" name="edit" class="btn btn-warning" data-toggle="modal"
                                            data-target="#EditUser" data-user_id_edit="<?= $view_users_id ?>"
                                            data-user_name_edit="<?= $view_users_name ?>"
                                            data-user_username_edit="<?= $view_users_username ?>"
                                            data-user_email_edit="<?= $view_users_email ?>"
                                            data-user_image_edit="<?= $view_users_image ?>"
                                            data-user_type_edit="<?= $view_users_type ?>"
                                            data-user_type_edit1="<?= $view_users_type ?>"
                                            data-user_gender_edit="<?= $view_users_gender ?>"
                                            data-user_password_edit="<?= $view_users_password ?>"><span
                                                class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#DeleteUser" data-user_id_delete="<?= $view_users_id ?>"><span
                                                class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete
                                    </button>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </form>
                </div>
              
            </div>
        </section>
        <!-- Modal add new category -->
        <?php include "layout/modal/add_new_user.php" ?>
        <!-- Modal Delete Category-->
        <?php include "layout/modal/delete_user.php" ?>
        <!-- Modal EDIT  user -->
        <?php include "layout/modal/edit_user.php" ?>
        <!-- Modal add new post -->
        <?php include "layout/modal/add_new_post.php"; ?>
    </div>
    <?php include "layout/footer.php"; ?>

    <?php include "layout/rightsidebar.php"; ?>
    <?php include "layout/scripts.php"; ?>


</body>
</html>
