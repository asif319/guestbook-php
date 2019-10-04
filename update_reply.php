<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Reply</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if (isset($_GET['reply_id'])) {
    if (isset($_GET['message'])){
        if ($_GET['message'] == "incomplete"){
            echo "<br>";
            echo "<b>Please fill in message to update</b>";
            echo "<br>";
            echo "<br>";
        }
    }


    $pdo = new PDO("mysql:host=localhost;dbname=guestbook", "root", "");

    if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
    }

    if (isset($_GET['reply_id'])) {
        $reply_id = $_GET['reply_id'];
    }

    $upPostSql = "SELECT * FROM post WHERE post_id=:post_id";
    $upPostStatement = $pdo->prepare($upPostSql);
    $upPostStatement->bindParam(':post_id', $post_id);
    $upPostStatement->execute();
    $rows = $upPostStatement->fetchAll();

    foreach ($rows as $row) {
        ?>
        <br>
        <b style="padding-left: 20px;">Post</b>
        <br>
        <span class="time">
        <?php echo $row['time'] ?>
    </span>

        <span class="p">
        <?php echo "Name: " . $row['username'] ?>
    </span>

        <span class="p">
        <?php echo "Location: " . $row['location'] ?>
    </span>

        <span class="p">
        <?php echo "Email: " . $row['email'] ?>
    </span>

        <span class="p">
        <?php echo "Message: " . $row['message'] ?>
    </span>


        <?php
//End Foreach
    }

    $upReplySql = "SELECT * FROM reply WHERE reply_id=:reply_id";
    $upReplyStatement = $pdo->prepare($upReplySql);
    $upReplyStatement->bindParam(':reply_id', $reply_id);
    $upReplyStatement->execute();

    $replies = $upReplyStatement->fetchAll();

    foreach ($replies as $reply) {
        ?>
        <br>
        <b style="padding-left: 20px;">Replies</b>
        <br>
        <br>
        <span class="rtime">
        <?php echo $reply['time'] ?>
    </span>

        <span class="r">
        <?php echo "Name: " . $reply['username'] ?>
    </span>

        <span class="r">
        <?php echo "Location: " . $reply['location'] ?>
    </span>

        <span class="r">
        <?php echo "Email: " . $reply['email'] ?>
    </span>

        <span class="r">
        <?php echo "Message: " . $reply['message'] ?>
    </span>


        <div id="title">Update your reply</div>
        <br>
        <form action="verify_update_reply.php" method="POST">
        <?php
        echo "<input type='hidden' name='post_id' value='$post_id'>";
        echo "<input type='hidden' name='reply_id' value='$reply_id'>";
        ?>
        <label for="reply_message"> Reply:</label>
        <input type="text" name="reply_message" class="message_input" value="<?php echo $reply['message'] ?>">

        <input type="submit" value="Reply" class="submit_button">

    <?php } ?>
    </form>

    <?php
}
else
{
    header("Location: display_post.php");
}
?>
</body>
</html>