<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="layui/css/layui.css">
    <script src="layui/layui.js"></script>
</head>
<body>
<form class="layui-form" action="" style="width: 500px;margin-left: 500px;margin-top: 150px">
    <div class="layui-form-item">
        <label class="layui-form-label">名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" required  lay-verify="required" value="<?php echo $res['name']; ?>"  autocomplete="off" class="layui-input">
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">地址</label>
        <div class="layui-input-block">
            <input type="text" name="title" required  lay-verify="required"  value="<?php echo $res['address']; ?>" autocomplete="off" class="layui-input">
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">年龄</label>
        <div class="layui-input-block">
            <input type="text" name="title" required  lay-verify="required" value="<?php echo $res['age']; ?>" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">签名</label>
        <div class="layui-input-block">
            <input type="text" name="title" required  lay-verify="required" value="<?php echo $res['asign']; ?>" autocomplete="off" class="layui-input">
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">性别</label>
        <div class="layui-input-block">
            <input type="text" name="title" required  lay-verify="required" value="<?php echo $res['sex'] == 0 ? '男' :'女'; ?>" autocomplete="off" class="layui-input">
        </div>
    </div>




</form>
</body>
</html>