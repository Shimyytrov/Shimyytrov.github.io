<?php
date_default_timezone_set('Asia/Hong_Kong');
$conn = mysqli_connect('localhost', 'root', '', 'forum_data');
if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $date = date('m/d/Y h:i:s a', time());
    $title = $_POST['title'];
    $content = $_POST['content'];
    echo $user.'<br>';
    echo $date.'<br>';
    echo $title;
    echo $content;
    $qResult = mysqli_query($conn, "insert into posts (user, date, title, content) values('$user', '$date', '$title', '$content')");
}
mysqli_close($conn);
header('Location: index.php');