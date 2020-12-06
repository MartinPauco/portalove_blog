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




                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#InsertPost"><span
                                class="glyphicon glyphicon-plus" aria-hidden="true" onclick="mouseOver(this)"></span>
                        Add new post
                    </button>

                </div>
                <div class="box-body">

                    <form action="" method="post" onsubmit="return confirm('Are you sure you want to do that?');">
                        <!-- Post table -->
                        <table class="table table-hover">
                            <tr class="info">

                                <th style="text-align: center;">Title</th>
                                <th style="text-align: center;">Author</th>
                                <th style="text-align: center;">Category</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;"><i class="fa far fa-eye" aria-hidden="true"></i></th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Comments</th>

                                <th style="text-align: center;">Edit/Delete</th>
                            </tr>
                            <?php
                            $counter = 0;
                            $sql_select_post = "SELECT * FROM posts ORDER BY id desc";
                            $result_sql_select_post = mysqli_query($dbconnection, $sql_select_post);
                            while ($rowpost = mysqli_fetch_assoc($result_sql_select_post))
                            {
                            $view_post_id = $rowpost['id'];
                            $view_post_category = $rowpost['post_category'];
                            $view_post_title = $rowpost['post_title'];
                            $view_post_autor = $rowpost['post_autor'];
                            $view_post_date = $rowpost['post_date'];
                            $view_post_edit_date = $rowpost['post_edit_date'];
                            $view_post_image = $rowpost['post_image'];
                            $view_post_text = $rowpost['post_text'];
                            $view_post_tag = $rowpost['post_tag'];
                            $view_post_visit_counter = $rowpost['post_visit_counter'];
                            $view_post_status = $rowpost['post_status'];
                            $view_post_priority = $rowpost['post_priority'];

                            $counter++;

                            ?>
                            <tbody id="myTable">
                            <tr class="success">

                                <td style="text-align: left;"><a href="../post.php?postid=<?= $view_post_id; ?>"
                                                                 target="_blank"
                                                                 style="color:black"><?php echo $view_post_title ?></a>
                                </td>
                                <?php
                                $sql_select_users = "SELECT * FROM users WHERE id={$view_post_autor}";
                                $result_sql_select_users = mysqli_query($dbconnection, $sql_select_users);
                                while ($rowusers = mysqli_fetch_assoc($result_sql_select_users)) {
                                    $view_users_id = $rowusers['id'];
                                    $view_users_name = $rowusers['name'];
                                    $view_users_username = $rowusers['username'];
                                    $view_users_email = $rowusers['email'];
                                    $view_users_password = $rowusers['password'];
                                    $view_users_gender = $rowusers['gender'];
                                    $view_users_image = $rowusers['image'];
                                    $view_users_status = $rowusers['status'];
                                    $view_users_type = $rowusers['type'];
                                }
                                ?>


                                <td style="text-align: center;"><?php echo $view_users_name ?></td>
                                <?php
                                $sql_select_category_by_id = "SELECT * FROM categories WHERE id ={$view_post_category}";
                                $result_sql_select_category_by_id = mysqli_query($dbconnection, $sql_select_category_by_id);
                                while ($rowcategory_by_id = mysqli_fetch_assoc($result_sql_select_category_by_id)) {
                                    $view_category_id_by_id = $rowcategory_by_id['id'];
                                    $view_cat_title_by_id = $rowcategory_by_id['cat_title'];
                                    //$view_cat_desc_by_id = $rowcategory_by_id['cat_desc'];
                                }
                                ?>
                                <td style="text-align: center;"><?php echo $view_cat_title_by_id ?></td>
                                <td style="text-align: center;"><img class="zoom"
                                                                     src="images/blog/<?php echo $view_post_image; ?>"
                                                                     width="50"></td>
                                <td style="text-align: center;"><span
                                            class="label label-success"><?php echo $view_post_visit_counter ?></span>
                                </td>
                                <?php
                                if ($view_post_status == 1) {
                                    ?>
                                    <td style="text-align: center;"><span class="label label-success">Published</span>
                                    </td>
                                    <?php
                                } else {
                                    ?>
                                    <td style="text-align: center;"><span class="label label-warning">Draft</span></td>
                                    <?php
                                }
                                ?>
                                <td style="text-align: center;">
                <span class="label label-success">
                  <?php
                  $sql_select_comment = "SELECT * FROM comments WHERE postid={$view_post_id}";
                  $result_sql_select_comment = mysqli_query($dbconnection, $sql_select_comment);
                  $count_cooments_for_post = 0;
                  while ($rowcomment = mysqli_fetch_assoc($result_sql_select_comment)) {
                      $count_cooments_for_post++;
                  }
                  echo $count_cooments_for_post++;
                  ?>
                  
                </span></td>
                                <td style="text-align: center;">

                                    <button type="button" name="edit" class="btn btn-warning" data-toggle="modal"
                                            data-target="#EditPost" data-post_id_edit="<?= $view_post_id ?>"
                                            data-post_category_edit="<?= $view_post_category ?>"
                                            data-post_title_edit="<?= $view_post_title ?>"
                                            data-post_autor_edit="<?= $view_post_autor ?>"
                                            data-post_date_edit="<?= $view_post_date ?>"
                                            data-post_edit_date_edit="<?= $view_post_edit_date ?>"
                                            data-post_image_edit="<?= $view_post_image ?>"
                                            data-post_text_edit="<?= $view_post_text ?>"
                                            data-post_tag_edit="<?= $view_post_tag ?>"
                                            data-post_visit_counter_edit="<?= $view_post_visit_counter ?>"
                                            data-post_status_edit="<?= $view_post_status ?>"
                                            data-post_priority_edit="<?= $view_post_priority ?>"><span
                                                class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#DeletePost" data-post_id_delete="<?= $view_post_id ?>"><span
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
        <!-- Modal add new post -->
        <?php include "layout/modal/add_new_post.php"; ?>
        <!-- Modal Delete Post-->
        <?php include "layout/modal/delete_post.php"; ?>
        <!-- Modal EDIT  Post -->
        <?php include "layout/modal/edit_post.php"; ?>
        <!-- Modal EDIT  user -->
        <?php include "layout/modal/edit_user.php" ?>
    </div>
    <?php include "layout/footer.php"; ?>

    <?php include "layout/rightsidebar.php"; ?>
    <?php include "layout/scripts.php"; ?>


</body>
</html>
