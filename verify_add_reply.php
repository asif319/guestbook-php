<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Add Reply</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<br>
<br>
<b>Are You Sure You Want To Add This Reply?</b>
<br>
<?php
if (isset($_POST['post_id']) && isset($_POST['reply_name']) && $_POST['reply_name']!="" && isset($_POST['reply_location'])
    && $_POST['reply_location'] !="" && isset($_POST['reply_email']) && $_POST['reply_email'] !="" && isset($_POST['reply_message']) && $_POST['reply_message'] !="")

{
echo $_POST['reply_name'];
echo "<br>";
echo $_POST['reply_location'];
echo "<br>";
echo $_POST['reply_email'];
echo "<br>";
echo $_POST['reply_message'];

session_start();
$_SESSION['post_id'] = $_POST['post_id'];
$_SESSION['reply_name'] = $_POST['reply_name'];
$_SESSION['reply_location'] =$_POST['reply_location'];
$_SESSION['reply_email'] = $_POST['reply_email'];
$_SESSION['reply_message'] = $_POST['reply_message'];
?>
<br>
<br>
<a href="reply_added.php">Yes</a>
&nbsp;
<a href="display_post.php">No</a>
<!--    if close-->
<?php }

else if ($_POST['reply_name']=="" || $_POST['reply_name']=="" || $_POST['reply_location'] || $_POST['reply_email'] || $_POST['reply_message'])
{
$message = "Incomplete";
$post_id = $_POST['post_id'];
    header("Location:display_reply.php?message=$message&post_id=$post_id");
}

else if (!isset($_POST['reply_name']) || !isset($_POST['reply_location']) || !isset($_POST['reply_email']) || !isset($_POST['reply_message']))
{
   header("Location:display_post.php");
}
?>
</body>
</html>