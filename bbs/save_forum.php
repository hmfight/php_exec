<?php
header("content-type:text/html;charset=utf8");
$forum_name = $_POST["forum_name"];
$forum_description = $_POST["forum_description"];
$Subject = $_POST['Subject'];
$time = date("Y-m-d H:i:s");
include "mysqli.php";
$sql = "insert into forums (forum_name,forum_description,subject,last_post_time) VALUES ('$forum_name','$forum_description','$Subject','$time')";
$que = $mysqli->query($sql);
if ($que) {
    echo "<script>alert('添加成功');location.href='index.php';</script>";
} else {
    echo "<script>alert('添加失败，请稍后再试');location.href='add_forum.php';</script>";
}
?>