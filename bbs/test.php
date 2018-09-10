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
