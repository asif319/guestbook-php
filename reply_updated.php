<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reply Updated</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();
if (isset($_SESSION['reply_id']))
{
    $pdo = new PDO("mysql:host=localhost;dbname=guestbook", "root", "");

    $reply_id = $_SESSION['reply_id'];
    $message = $_SESSION['reply_message'];

    $repUpSql = "UPDATE reply SET message=:message WHERE reply_id=:reply_id";
    $repUpStatement = $pdo->prepare($repUpSql);
    $repUpStatement->bindParam(':message', $message);
    $repUpStatement->bindParam(':reply_id', $reply_id);
    $repUpStatement->execute();

    header("Location:display_post.php");

}
else
{
    header("Location:display_post.php");
}
?>
</body>
</html>