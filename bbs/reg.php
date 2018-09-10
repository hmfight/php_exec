<?php
header("Content-type:text/html;charset=utf-8"); //设置编码
include "mysqli.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = trim($_POST['email']);
$log_time = date("Y-m-d H:i:s");
$sql = "select * from menber where username='$username'";
$result = $mysqli->query($sql);
$num = $result->num_rows;
if ($num > 0) {
    echo "<script>alert('用户名已经被注册');location.href='reg.html';</script>";
} else {
    $sql = "insert into member(username,password,email,log_time)VALUES
 ('$username','$password','$email','$log_time')";
    $que = $mysqli->query($sql);
    $_SESSION['username'] = $username;
    echo "<script>alert('注册成功');location.href='login.html'</script>";
}
?>