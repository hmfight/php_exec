<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add</title>
    <link rel="stylesheet" href="layui/css/layui.css">
    <script src="layui/layui.js"></script>
</head>
<style>
    body{
        background-color: #ebf2ff;
    }
</style>
<body>
<form class="layui-form" action="Action.php?action=4" METHOD="post" style="width: 500px;height: 300px;margin-top: 200px;margin-left: 500px">

    <input type="hidden" name="id"   lay-verify="required" value="<?php echo $res['id']; ?>" >

    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
            <input type="text" name="name" required  lay-verify="required" value="<?php echo $res['name']; ?>" placeholder="请输入用户名" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">地址</label>
        <div class="layui-input-block">
            <input type="text" name="address" required  lay-verify="required" value="<?php echo $res['address']; ?>" placeholder="请输入地址" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">年龄</label>
        <div class="layui-input-block">
            <input type="text" name="age" required  lay-verify="required" value="<?php echo $res['age']; ?>" placeholder="请输入年龄" autocomplete="off" class="layui-input">
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">签名</label>
        <div class="layui-input-block">
            <input type="text" name="asign" required  lay-verify="required" value="<?php echo $res['asign']; ?>" placeholder="请输入签名" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">单选框</label>
        <div class="layui-input-block">
            <input type="radio" name="sex" value="<?php echo $res['sex']; ?>" checked title="男">
            <input type="radio" name="sex" value="<?php echo $res['sex']; ?>" title="女">
        </div>
    </div>


    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

</body>

<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

    });
</script>
</html>