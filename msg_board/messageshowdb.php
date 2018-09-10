<?php
/**
 * User: wangjia
 * Date: 2018/8/29
 * Time: 12:18
 */
include 'mysqli.php';
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$num = $_GET["num"];
$startnum = ($page - 1) * $num; //开始位置
$con = isset($_GET["con"]) ? $_GET["con"] : "";//搜索关键字
$content = isset($_GET["content"]) ? $_GET["content"] : "";
$sql = "select * from message ";
if ($content == "sousou") {
    $sql = $sql . "where title like '%" . $con . "%'";
}
$sql .= sprintf("order by id asc limit %s,%s", ($page - 1) * $num, $num);;
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arr[$row["id"]]["title"] = $row["title"];//$arr[1]["title"]=$row["title"]
        $arr[$row["id"]]["content"] = $row["content"];//$arr[1]["content"]=$arr["content"]
    }
}
echo json_encode($arr);