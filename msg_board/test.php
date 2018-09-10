<?php
/**
 * User: wangjia
 * Date: 2018/8/29
 * Time: 18:00
 */
include 'mysqli.php';
//$num = $_GET["num"];//每页显示的个数
$num = 4;
$sql = "select * from message";
$result = $mysqli->query($sql);
print_r($result);

echo "<br>";

print_r($result->fetch_row());
echo "<br>";
echo $result->num_rows;
////$row = $result->;//总记录数
////$row = $result->//总记录数
////$totalpage = ceil($row[0] / $num);
//echo 5;