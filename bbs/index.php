<!DOCTYPE html>
<html lang="en">
<head>
    <title>论坛首页</title>
    <meta charset="UTF-8">
    <style>
        table {
            width: 55%;
            margin-top: 10px;
        }

        .title {
            background-color: #B10707;
            font-size: 17px;
            color: white;
        }

        .right {
            margin-left: 120px;
        }
    </style>
</head>
<body>
<table border="1px" cellspacing="0" cellpadding="8" align="center">
    <tr class="title">
        <td COLSPAN="3">
            论坛列表<span class="right">[<a style="color: white" href="add.html">添加</a> ]</span>
        </td>
    </tr>
    <tr>
        <td width="10%"><strong>主题</strong></td>
        <td width="40"><strong>论坛</strong></td>
        <td width="15"><strong>最后更新</strong></td>
    </tr>
    <?php
    include "mysqli.php";
    $sql = "select * from forums";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td><div class='bold'>
            <a class='forum' href='forums.php?F='" . $row["id"] . ">" . $row["forum_name"] . "</a>
                    </div>" . $row["forum_description"] . "</td>";
            echo "<td>";
            echo "<div>" . $row["last_post_time"] . "</div>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>对不起，论坛正在建设中，感谢你的关注......</td></tr>";
    }
    ?>
</body>
</html>
