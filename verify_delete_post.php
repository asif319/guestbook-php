<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if (isset($_GET['post_id']))
{
echo "Are you sure you want to delete this post?";

$post_id = $_GET['post_id'];
?>

<br>
<br>

<a href="post_deleted.php?post_id=<?php echo $_GET['post_id']?>">Yes</a>
&nbsp;
<a href="display_post.php ">No</a>
<?php }
else {
  header("Location:display_post.php");
}
?>
</body>
</html>