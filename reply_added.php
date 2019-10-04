<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reply Added</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();
if (isset($_SESSION['post_id'])) {

    $pdo = new PDO("mysql:host=localhost;dbname=guestbook", "root", "");

    $post_id = $_SESSION['post_id'];
    $time = date("y-m-d h:i:sa");
    $username = $_SESSION['reply_name'];
    $email = $_SESSION['reply_email'];
    $message = $_SESSION['reply_message'];
    $location = $_SESSION['reply_location'];

    //$replySql = "INSERT INTO reply(post_id, time, username, location, email, message) VALUES (:post_id, :time, :username, :location, :email,:message)";
$replySql = "INSERT INTO reply(post_id, time, username, location, email, message) VALUES (:post_id, :time, :username, :location, :email, :message)";
    $replyStatement = $pdo->prepare($replySql);
    $replyStatement->bindParam(':post_id', $post_id);
    $replyStatement->bindParam(':time', $time);
    $replyStatement->bindParam(':username', $username);
    $replyStatement->bindParam(':location', $location);
    $replyStatement->bindParam(':email', $email);
    $replyStatement->bindParam(':message', $message);

    $replyStatement->execute();

    header("Location:display_post.php");

}
else
{
    header("Location:display_post.php");
}
?>
</body>
</html>