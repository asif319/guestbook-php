<?php
if (isset($_POST['reply_id']) && isset($_POST['reply_message']) && $_POST['reply_message'] !="")
{
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Verify Update Reply</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <br>
    <br>
    <b>Are you sure you want to update this reply</b>
    <br>
    <?php
    session_start();

    $_SESSION['reply_id'] = $_POST['reply_id'];
    $_SESSION['reply_message'] = $_POST['reply_message'];
    ?>
    <br>
    <a href="reply_updated.php">Yes</a>
    &nbsp;
    <a href="display_post.php">No</a>
    </body>
    </html>

    <?php
}
else if (isset($_POST['reply_id']) && isset($_POST['reply_message']) && $_POST['reply_message'] =="")
{
    $value = "incomplete";
    $post_id = $_POST['post_id'];
    $reply_id = $_POST['reply_id'];

    header("Location:update_reply.php?message=$value&reply_id=$reply_id&post_id=$post_id");
}
else
{
    header("Location:display_post.php");
}
 ?>




