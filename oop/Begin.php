<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/24
 * Time: 10:45
 */

include "MyConnect.php";
include "View.php";

class Begin{

    function run(){
        $a=new MyConnect();
        $re=$a->my_query("select * from user");
        $r=$a->my_fetch_all();
        $v=new View();
        //赋值数据
        $v->assign('res',$r);
        //调用模板
        $v->display('index1.php');
    }
}
