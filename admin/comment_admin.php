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


                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#InsertComment"><span
                                class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add new comment
                    </button>

                </div>
                <div class="box-body">

                    <form action="" method="post">
                        <!-- comment table -->
                        <table class="table table-hover">
                            <tr class="info">

                                <th style="text-align: center;">Autor</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Post title</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Edit/Delete</th>
                            </tr>


                            <?php
                            $sql_select_comment = "SELECT * FROM comments ORDER BY comm_status asc";
                            $result_sql_select_comment = mysqli_query($dbconnection, $sql_select_comment);
                            while ($rowcomment = mysqli_fetch_assoc($result_sql_select_comment))
                            {
                            $view_comm_id = $rowcomment['id'];
                            $view_comm_postid = $rowcomment['postid'];
                            $view_comm_autor = $rowcomment['comm_autor'];
                            $view_comm_email = $rowcomment['comm_email'];
                            $view_comm_text = $rowcomment['comm_text'];
                            $view_comm_status = $rowcomment['comm_status'];
                            $view_comm_date = $rowcomment['comm_date'];
                            ?>
                            <tbody id="myTable">
                            <tr class="success">

                                <td style="text-align: center;"><?php echo $view_comm_autor; ?></td>
                                <td style="text-align: center;"><?php echo $view_comm_email; ?></td>
                                <?php
                                $sql_select_post = "SELECT * FROM posts WHERE id = {$view_comm_postid}";
                                $result_sql_select_post = mysqli_query($dbconnection, $sql_select_post);
                                while ($rowpost = mysqli_fetch_assoc($result_sql_select_post)) {
                                    $view_post_id = $rowpost['id'];
                                    $view_post_title = $rowpost['post_title'];
                                }
                                ?>
                                <td style="text-align: center;">
                                    <a href="../post.php?postid=<?= $view_comm_postid ?>" target="_blank">
                                        <?php
                                        echo $view_post_title;
                                        ?>
                                    </a>
                                </td>

                                <?php
                                if ($view_comm_status == 1) {
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
                                            data-target="#EditComment" data-comment_id_edit="<?= $view_comm_id ?>"
                                            data-comment_postid="<?= $view_comm_postid ?>"
                                            data-comment_autor="<?= $view_comm_autor ?>"
                                            data-comment_email="<?= $view_comm_email ?>"
                                            data-comment_text="<?= $view_comm_text ?>"
                                            data-comment_date="<?= $view_comm_date ?>"><span
                                                class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#DeleteComment" data-comment_id_delete="<?= $view_comm_id ?>">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete
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
        <?php include "layout/modal/delete_comment.php" ?>
        <!-- Modal EDIT  category -->
        <?php include "layout/modal/edit_comment.php" ?>
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
