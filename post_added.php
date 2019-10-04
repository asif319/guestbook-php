<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Post</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();
if (isset($_SESSION['post_name'])) {

    $pdo = new PDO("mysql:host=localhost;dbname=guestbook", "root", "");

    $time = date("Y/m/d h:i:sa");

    $username = $_SESSION['post_name'];
    $email = $_SESSION['post_email'];
    $location = $_SESSION['post_location'];
    $message = $_SESSION['post_message'];

    $postSql = "INSERT INTO post(time, username, email, location, message) VALUES (:time,:username,:email,:location,:message)";

    $postStatement = $pdo->prepare($postSql);
    $postStatement->bindParam(':time', $time);
    $postStatement->bindParam(':username', $username);
    $postStatement->bindParam(':email', $email);
    $postStatement->bindParam(':location', $location);
    $postStatement->bindParam(':message', $message);


    $postStatement->execute();

    header("Location:display_post.php");
}
else
{
    header("Location:display_post.php");
}
?>

</body>
</html>