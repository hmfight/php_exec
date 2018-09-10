<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/26
 * Time: 13:47
 */
session_start();
include "MyConnect.php";
include "View.php";
$v=new View();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $sql="select * from admin where name = '".$name."' and password = '".md5($password)."' ";
    $link=new MyConnect();
    $re=$link->my_query($sql);

    if($re->num_rows){
        $_SESSION['auth']=1;
        header("location:index.php");
    }else{
        $v->display('is_login.php');
    }
}else{
    $v->display('is_login.php');
}




