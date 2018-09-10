<?php
/**
 * User: wangjia
 * Date: 2018/8/29
 * Time: 10:54
 */
include "connc.inc.php";
$mysqli = new mysqli(HOST, USER, PWD, DBNAME);
$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
    die("mysql conn error" . $mysqli->connect_errno);
}