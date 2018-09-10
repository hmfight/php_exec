<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>
<br/>
<br/>
<?php
echo $_POST["email"];
$con = mysqli_connect("127.0.0.1", "root", "wangjia", "testdb");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

$result = $con->query("select count(*) from user_demo");
print_r($result);
echo "<br>";
var_dump($result);
echo "<br>";

$count = $result->fetch_row();
$i = 1;
foreach ($count as $num) {
    echo "$i ->" . $num;
    $i++;
}

$dbcolarray = array("id", "user_name", "age", "sex", "email", "phone_num", "birthday", "create_time", "update_time");
$result = $con->query("select * from user_demo");
//表格
echo '<table id="Table" border=1 cellpadding=10 cellspacing=2 bordercolor=#ffaaoo>';
//表头
$thstr = "<th>" . implode("</th><th>", $dbcolarray) . "</th>";
echo $thstr;
//表中的内容
//$row=mysql_fetch_array($result, MYSQL_ASSOC);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))//与$row=mysql_fetch_assoc($result)等价
{
    echo "<br>";
    echo "<tr>";
    $tdstr = "";
    foreach ($dbcolarray as $td)
        $tdstr .= "<td>$row[$td]</td>";
    echo $tdstr;
    echo "</tr>";
}
echo "</table>";
//mysql_free_result($result);
//mysql_close($conn);
?>
</body>
</html>