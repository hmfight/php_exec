<?php
session_start();
header("Content-type:text/html;charset=utf-8");
include "mysqli.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
if ($username == '') {
    echo "<script>alert('请输入用户名');location='login.html';</script>";
    exit;
}
if ($password == '') {
    echo "<script>alert('请输入密码');</script>";
    exit;
}
$sql = "select id,username,password from member where username = ?"; //从数据库查询信息
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
//$sql = "select id,username,password from member where username= $username"; //从数据库查询信息
//$result = $mysqli->query($sql);
echo $mysqli->error;
$row = $result->fetch_assoc();
if ($row) {
    if ($password != ($row['password']) || $username != $row['username']) {
        echo "<script>alert('密码错误，请重新输入');location='login.html'</script>";
        exit;
    } else {
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        echo "<script>alert('登录成功');location='index.php'</script>";
    }
} else {
    echo "<script>alert('您输入的用户名不存在');location='login.html'</script>";
    exit;
};
?>