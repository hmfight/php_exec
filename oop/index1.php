<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="layui/css/layui.css">
    <script src="layui/layui.js"></script>
</head>
<body>
<?php if ($_SESSION['auth'] == 1) { ?>
    <a style="margin-top: 150px;text-align: right" href="Action.php?action=0" class="layui-btn layui-btn layui-btn-normal">退出</a>
    <a style="margin-top: 150px" href="Action.php?action=2" class="layui-btn layui-btn layui-btn-warm">添加</a>
<?php } else { ?>
    <a style="margin-top: 150px;text-align: right" href="Login.php" class="layui-btn layui-btn layui-btn-normal">登录</a>
<?php } ?>

<table class="layui-table">
    <colgroup>
        <col>
        <col>
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>id</th>
        <th>名字</th>
        <th>年龄</th>
        <th>性别</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($res as $re) { ?>
        <tr>
            <td><?php echo $re[0]; ?></td>
            <td><?php echo $re[1]; ?></td>
            <td><?php echo $re[3]; ?></td>
            <td><?php echo $re[5] == 0 ? '男' : '女'; ?></td>

            <?php if (@$_SESSION['auth']) { ?>
                <!--当前已登陆-->
                <td>
                    <a href="Action.php?id=<?php echo $re[0]; ?>&action=3">删除</a>
                    <a href="Action.php?id=<?php echo $re[0]; ?>&action=4">更新</a>
                    <a href="Action.php?id=<?php echo $re[0]; ?>&action=1">查看</a>
                </td>
            <?php } else {
                ?>
                <td><a href="Action.php?id=<?php echo $re[0]; ?>&action=1">查看</a></td> <?php
            } ?>

        </tr>
    <?php } ?>

    </tbody>
</table>
</body>
</html>