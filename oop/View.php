<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/26
 * Time: 11:13
 */

class View{

    protected $date=[];

    public function assign($key,$val){
        $this->date[$key]=$val;
    }

    public function display($file_name){
        extract($this->date);
        include "$file_name";
    }
}