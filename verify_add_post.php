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
if (isset($_POST['post_name']) && $_POST['post_name']!="" && isset($_POST['post_email']) && $_POST['post_email']!=""
    && isset($_POST['post_location']) && $_POST['post_location']!="" && isset($_POST['post_message']) && $_POST['post_message']!="")
{
    echo "Are you sure you want to add this post?";
    echo "<br>";

    echo $_POST['post_name'];
    echo "<br>";
    echo $_POST['post_email'];
    echo "<br>";
    echo $_POST['post_location'];
    echo "<br>";
    echo $_POST['post_message'];

    session_start();

    $_SESSION['post_name'] = $_POST['post_name'];
    $_SESSION['post_email'] = $_POST['post_email'];
    $_SESSION['post_location'] = $_POST['post_location'];
    $_SESSION['post_message'] = $_POST['post_message'];


    echo "<br>";
    echo "<br>";
    echo "<a href='post_added.php'>Yes</a>";
    echo "&nbsp";
    echo "<a href='display_post.php'>No</a>";
}else if (!isset($_POST['post_name']) || !isset($_POST['post_email']) || !isset($_POST['post_location']) || !isset($_POST['post_message']))
{
header("Location:display_post.php");
}

else if ($_POST['post_name']=="" || $_POST['post_email']=="" || $_POST['post_location']=="" || $_POST['post_message']=="")
{
    $value = "Incomplete";
    header("Location:display_post.php?field=$value");
}
?>



</body>
</html>