<?php
if (isset($_GET['reply_id']))
{
    $pdo = new PDO("mysql:host=localhost;dbname=guestbook", "root", "");

    $reply_id = $_GET['reply_id'];

    $repDelSql = "DELETE FROM reply WHERE reply_id=:reply_id";

    $repDelStatement = $pdo->prepare($repDelSql);
    $repDelStatement->bindParam(':reply_id', $reply_id);
    $repDelStatement->execute();

    header("Location:display_post.php");

}
else
{
    header("Location:display_post.php");
}
