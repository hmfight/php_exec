<?php

/**
 * Created by PhpStorm.
 * User: wangjia
 * Date: 2016/12/31
 * Time: 上午11:06
 */
class Car {
    public $speed = 0; //汽车的起始速度是0

    public function speedUp() {
        $this->speed += 10;
        return $this->speed;
    }
}

//定义继承于Car的Truck类
class Truck extends Car {
    public function speedUp() {
        $this->speed;
        echo parent::speedUp();
        $this->speed += 50;
        return $this->speed;
    }
}

$car = new Truck();
$car->speedUp();
echo $car->speed;