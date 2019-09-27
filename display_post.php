<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guest Book</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php

session_start();
if (isset($_SESSION["post_id"]))
{
    $_SESSION = array();
    session_destroy();
} /* Erase any previous session data when you arrive */

if (isset($_GET["field"])){
    echo "<br> Please fill in all fields </br>";
    echo "<br>";
    echo "<br>";
//    if ($_GET["field"] == '$value')
//    {
//        echo "<br> Please fill in all fields </br>";
//        echo "<br>";
//        echo "<br>";
//    }
} /* Displays text if entered incomplete post */
$pdo = new PDO("mysql:host=localhost;dbname=guestbook", "root", "");

$postSql = "SELECT * FROM post";

$postStatement = $pdo->prepare($postSql);
$postStatement->execute();

$rows = $postStatement->fetchAll();
?>


<body>
<?php
foreach ($rows as $row) {
    //$post_id = $row['post_id'];
    ?>
    <a class="delete_post" href="verify_delete_post.php?post_id= <?php echo $row['post_id'] ?>">Delete Post</a>

    <a class="update_post" href="update_post.php?post_id=<?php echo $row['post_id'] ?>">Update Post</a>

    <a class="display_reply" href="display_reply.php?post_id=<?php echo $row['post_id'] ?>">Display Replies</a>

    <span class="time">
        <?php echo $row['time'] ?>
    </span>

    <span class="post_row">
        <?php echo "Name: " . $row['username'] ?>
    </span>

    <span class="post_row">
        <?php echo "Location: " . $row['location'] ?>
    </span>

    <span class="post_row">
        <?php echo "Email: " . $row['email'] ?>
    </span>

    <span class="post_row">
        <?php echo "Message: " . $row['message'] ?>
    </span>

    <br>
<?php } ?>

<span id="title">Leave Message</span>

<form action="verify_add_post.php" method="POST">
    <label for="post_name">Name</label>
    <input type="text" name="post_name">

    <br>

    <label for="post_location">Location</label>
    <input type="text" name="post_location">

    <br>

    <label for="post_email">Email</label>
    <input type="text" name="post_email">

    <br>

    <label for="post_message" id="message">Message</label>
    <input type="text" name="post_message">



    <input type="submit" class="submit" value="POST">

</form>

</body>
</html>
