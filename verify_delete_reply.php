<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Delete Reply</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if (isset($_GET['reply_id'])) {
    $reply_id = $_GET['reply_id'];
    ?>
    <br>
    <br>
    <b>Are you sure you want to delete this reply?</b>
    <br>
    <br>
    <?php echo "<a href='reply_deleted.php?reply_id=$reply_id'>Yes</a>" ?>
    &nbsp;
    <a href="display_post.php">No</a>
    <?php
}
else
{
    header("Location:display_post.php");
}
?>
</body>
</html>