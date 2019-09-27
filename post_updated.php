<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Post</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['post_message']) && isset($_GET['post_id'])) {
    $pdo = new PDO("mysql:host=localhost;dbname=guestbook", "root", "");

    $post_id = $_GET['post_id'];
    $message = $_SESSION['post_message'];

    $updateSql = "UPDATE post SET message=:message WHERE post_id='$post_id'";
    $statement = $pdo->prepare($updateSql);
    $statement->bindParam(':message', $message);
    $statement->execute();

    header("Location:display_post.php");

}else{
    header("Location:display_post.php");
}
?>
</body>
</html>