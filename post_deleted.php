<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Post</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if (isset($_GET['post_id'])) {
    $pdo = new PDO("mysql:host=localhost;dbname=guestbook", "root", "");

    $post_id = $_GET['post_id'];

    $delSql = "DELETE FROM post WHERE post_id = '$post_id'";
    $delStatement = $pdo->prepare($delSql);
    $delStatement->execute();

    $delSql = "DELETE FROM reply WHERE post_id = '$post_id'";
    $delStatement = $pdo->prepare($delSql);
    $delStatement->execute();

    header("Location:display_post.php");

}
else{
    header("Location:display_post.php");
}
?>

</body>
</html>