<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>
<br/>
<br/>
<?php
echo $_POST["email"];
$con = mysql_connect("127.0.0.1:3306", "root", "wangjia");
echo $con;
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("testdb", $con);
$result = mysql_query("select count(*) from user_demo", $con);
var_dump($result);
echo $result;
$count = mysql_fetch_row($result);
$i = 0;
foreach ($count as $num) {
    echo "$i ->" . $num;
    $i++;
}

$dbcolarray = array("id", "user_name", "age", "sex", "email", "phone_num", "birthday", "create_time", "update_time");
$result = mysql_query("select * from user_demo", $con);
//表格
echo '<table id="Table" border=1 cellpadding=10 cellspacing=2 bordercolor=#ffaaoo>';
//表头
$thstr = "<th>" . implode("</th><th>", $dbcolarray) . "</th>";
echo $thstr;
//表中的内容
//$row=mysql_fetch_array($result, MYSQL_ASSOC);
var_dump($row);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))//与$row=mysql_fetch_assoc($result)等价
{
    echo "<tr>";
    $tdstr = "";
    foreach ($dbcolarray as $td)
        $tdstr .= "<td>$row[$td]</td>";
    echo $tdstr;
    echo "</tr>";
}
echo "</table>";
mysql_free_result($result);
mysql_close($conn);
?>
</body>
</html>