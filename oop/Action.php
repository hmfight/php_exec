<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/26
 * Time: 13:25
 */
include "MyConnect.php";
include "View.php";
$id=@$_GET['id'];

//各种操作的符号
//0  退出
//1 查看
//2 添加
//3 删除
//4 更新

$action=$_GET['action'];
$link=new MyConnect();
$v=new View();
if($action == 0 ){
    unset($_SESSION['auth']);
    header("Location:Login.php");
}

//4 更新
if($action == 4){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id= $_POST['id'];
        $name= $_POST['name'];
        $address= $_POST['address'];
        $age= $_POST['age'];
        $asign= $_POST['asign'];
        $sex= $_POST['sex'];
        $sql="update user set  name = '".$name."' ,address = '".$address."' , age = '".$age."',asign = '".$asign."',sex = '".$sex."' where id = '".$id."' ";
        $bool=$link->my_query($sql);
        header("Location:index.php");
    }else{

        $sql="select * from user where id = " .$id;
        $link->my_query($sql);
        $r=$link->my_fetch_assoc();
        $v->assign('res',$r);
        $v->display('update.php');
    }

}

//3 删除
if($action == 3){
    $sql="delete from user where id = ".$id;
    $link->my_query($sql);
    header("Location:index.php");
}
//2添加
if($action == 2 ){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name= $_POST['name'];
        $address= $_POST['address'];
        $age= $_POST['age'];
        $asign= $_POST['asign'];
        $sex= $_POST['sex'];
        $sql="insert into user (name,address,age,asign,sex) VALUE ('".$name."','".$address."','".$age."','".$asign."','".$sex."') ";
        $link->my_query($sql);
        header("Location:index.php");
    }else{
        $v->display('add.php');
    }
}



//1 查看详情
if($action == 1){
    $sql="select * from user where id = " .$id;
    $link->my_query($sql);
    $r=$link->my_fetch_assoc();
    $v->assign('res',$r);
    $v->display('detail.php');
}



