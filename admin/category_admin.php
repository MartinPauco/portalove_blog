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


                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#InsertCategory">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add new category
                    </button>
                    
                </div>
                <div class="box-body">

                    <form action="" method="post">
                        <!-- category table -->
                        <table class="table table-hover">
                            <tr class="info">
                                <th style="text-align: center;">Title</th>
                                <th style="text-align: center;">Description</th>
                                <th style="text-align: center;">Posts</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Edit/Delete</th>
                            </tr>
                            <?php
                            $counter = 0;
                            $sql_select_category = "SELECT * FROM categories ORDER BY id desc";
                            $result_sql_select_category = mysqli_query($dbconnection, $sql_select_category);
                            while ($rowcategory = mysqli_fetch_assoc($result_sql_select_category))
                            {
                            $view_category_id = $rowcategory['id'];
                            $view_cat_title = $rowcategory['cat_title'];
                            $view_cat_desc = $rowcategory['cat_desc'];
                            $view_cat_status = $rowcategory['cat_status'];
                            $view_cat_priority = $rowcategory['cat_priority'];
                            $view_cat_date = $rowcategory['cat_date'];
                            $counter++;

                            ?>
                            <tbody id="myTable">
                            <tr class="success">

                                <td style="text-align: center;"><?php echo $view_cat_title ?></td>
                                <td style="text-align: center;"><?php echo $view_cat_desc ?></td>
                                <?php
                                $posts_category_counter = 0;
                                $sql_select_category_posts = "SELECT * FROM posts WHERE post_category={$view_category_id}";
                                $result_sql_selectcategory_posts = mysqli_query($dbconnection, $sql_select_category_posts);
                                while ($rowcategorypost = mysqli_fetch_assoc($result_sql_selectcategory_posts)) {
                                    $posts_category_counter++;
                                }
                                ?>
                                <td style="text-align: center;"><?php echo $posts_category_counter; ?></td>
                                <?php
                                if ($view_cat_status == 1) {
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

                                    <button type="button" name="edit" class="btn btn-warning" data-toggle="modal"
                                            data-target="#EditCategory" data-category_id_edit="<?= $view_category_id ?>"
                                            data-category_title_edit="<?= $view_cat_title ?>"
                                            data-cat_desc_edit="<?= $view_cat_desc ?>"
                                            data-cat_priority_edit="<?= $view_cat_priority ?>"
                                            data-cat_date_edit="<?= $view_cat_date ?>"><span
                                                class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#DeleteCategory"
                                            data-category_id_delete="<?= $view_category_id ?>"><span
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
        <?php include "layout/modal/add_new_category.php" ?>
        <!-- Modal Delete Category-->
        <?php include "layout/modal/delete_category.php" ?>
        <!-- Modal EDIT  category -->
        <?php include "layout/modal/edit_category.php" ?>
        <!-- Modal add new post -->
        <?php include "layout/modal/add_new_post.php"; ?>
        <!-- Modal EDIT  user -->
        <?php include "layout/modal/edit_user.php" ?>
    </div>
    <?php include "layout/footer.php"; ?>

    <?php include "layout/rightsidebar.php"; ?>
    <?php include "layout/scripts.php"; ?>


</body>
</html>
