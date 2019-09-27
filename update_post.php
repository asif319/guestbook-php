<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Post</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if (isset($_GET['post_id'])){
    if (isset($_GET["message"])){
        if ($_GET["message"] == "Incomplete") {
            echo "<br><b> Please fill in all fields </b>";
            echo "<br>";
            echo "<br>";
        }
    }

$pdo = new PDO("mysql:host=localhost;dbname=guestbook", "root", "");

$post_id = $_GET['post_id'];

$updateSql = "SELECT * FROM post WHERE post_id = '$post_id'";
$updateStatement = $pdo->prepare($updateSql);
$updateStatement->execute();
$results = $updateStatement->fetchAll();
?>

<?php foreach ($results as $result) { ?>
    <span class="time">
        <?php echo $result['time'] ?>
    </span>

    <span class="post_row">
        <?php echo "Name: " . $result['username'] ?>
    </span>

    <span class="post_row">
        <?php echo "Location: " . $result['location'] ?>
    </span>

    <span class="post_row">
        <?php echo "Email: " . $result['email'] ?>
    </span>

    <span class="post_row">
        <?php echo "Message: " . $result['message'] ?>
    </span>

    <div id="title" style="text-align: left">Update Your Post</div>
    <br>
    <form action="verify_update_post.php" method="POST">
        <?php
        $post_id = $_GET['post_id'];
        echo "<input type=\"hidden\" name=\"post_id\" value=\"$post_id\">"
        ?>
        <label for="post_message">Message:</label>

        <input type="text" name="post_message" class="message_input" value="<?php echo $result['message']?>">

        <input type="submit" value="POST" class="submit_button">
    </form>
<!--Foreach statement end-->
<?php } ?>
<!--If statement end-->
<?php }
else{
    header("Location:display_post.php");
}
?>
</body>
</html>