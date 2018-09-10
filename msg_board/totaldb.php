<?php
/**
 * User: wangjia
 * Date: 2018/8/29
 * Time: 18:00
 */
include 'mysqli.php';
$num = $_GET["num"];//每页显示的个数
if (!isset($num)) {
    $num = 4;
}
$sql = "select count(*) from message";
$result = $mysqli->query($sql);
if ($result->num_rows === 1) {
    $row = $result->fetch_row();
}
$totalpage = ceil($row[0] / $num);
echo $totalpage;