<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Message</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if (isset($_POST['post_id']) && $_POST['post_message'] && $_POST['post_message'] !="") {
    echo "<br>";
    echo "<br>";

    echo "Are you sure you want to update the post?";

    session_start();

    $_SESSION['post_message'] = $_POST['post_message'];
    $_SESSION['post_id'] = $_POST['post_id'];
    ?>
    <br>
    <br>

    <a href="post_updated.php?post_id=<?php echo $_POST['post_id'] ?>">Yes</a>
    &nbsp;
    <a href="display_post.php">No</a>

    <?php
}else if (isset($_POST['post_id']) && isset($_POST['post_message'])){
$post_id = $_POST['post_id'];
$value = "Incomplete";

header("Location:update_post.php?message=$value&post_id=$post_id");
}else{
header("Location:display_post.php");
}
?>
</body>
</html>