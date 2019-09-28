<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display Reply</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if (isset($_GET['post_id'])){

    if (isset($_GET['message'])){
        if ($_GET['message'] == "Incomplete"){
            echo "<b>Please Fill In All Fields</b>";
            echo "<br> <br>";
        }
    }


$pdo = new PDO("mysql:host=localhost;dbname=guestbook", "root", "");

$post_id = $_GET['post_id'];

$replySql = "SELECT * FROM post WHERE post_id=$post_id";
$replyStatement = $pdo->prepare($replySql);
$replies = $replyStatement->fetchAll();
?>

<?php foreach ($replies as $reply) {?>

<span class="time"><?php echo $reply['time']?></span>

<span class="p"><?php echo $reply['username']?></span>

<span class="p"><?php echo $reply['location']?></span>

<span class="p"><?php echo $reply['email']?></span>

<span class="p"><?php echo $reply['message']?></span>
<?php }?>

<?php
$replyShowSql = "SELECT * FROM reply WHERE post_id=$post_id";
$replyShowState= $pdo->prepare($replyShowSql);
$replyShowState->execute();

$repShows = $replyShowState->fetchAll();
?>

<?php foreach ($repShows as $repShow) {?>
    <a class="rdelete_reply" href="verify_delete_reply.php?reply_id=<?php echo $repShow['reply_id'] ?>">Delete Reply</a>
    <?php
    $reply_id = $repShow['reply_id'];
    $update_reply = "update_reply.php?post_id=$post_id & reply_id=$reply_id";
    ?>

        <a class="rupdate_reply" href="<?php $update_reply ?>">Update Reply</a>
    <br>
    <br>

    <span class="r"><?php $repShow['time'] ?></span>

    <span class="r"><?php $repShow['username'] ?></span>

    <span class="r"><?php $repShow['location'] ?></span>

    <span class="r"><?php $repShow['email'] ?></span>

    <span class="r"><?php $repShow['message'] ?></span>

<?php } ?>

<div id="title">Leave A Reply</div>

<form action="verify_add_reply.php" method="POST">
    <input type="hidden" value="<?php $post_id ?>" name="post_id">

    <label for="reply_name">Name</label>
    <input type="text" name="reply_name" class="name_input">
    <br>

    <label for="reply_email">Email</label>
    <input type="text" name="reply_email">
    <br>

    <label for="reply_location">Location</label>
    <input type="text" name="reply_location">
    <br>

    <label for="reply_message">Message</label>
    <input type="text" id="message" name="reply_email">
    <br>

    <input type="submit" value="Reply" class="submit">


</form>
<!--    if close-->
<?php}
else
{
    header("Location:display_post.php");
}
?>
</body>
</html>