<!DOCTYPE html>
<html>
<head>
    <title>留言板</title>
    <meta charset="UTF-8">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <style>
        #div1 div {
            height: 30px;
            line-height: 30px;
            padding-left: 10px;
            background: #f0f0f0;
            margin-bottom: 1px
        }
    </style>

</head>
<body>
<div><h1>留言板</h1></div>
<div>
    <label for="con">搜索:</label><input id="con" name="sousuo">
    <input id="sousou" type="button" value="确定"></div>
<br>
<div id="div1"></div>
<div id="page"></div>
<div>
    <label for="title">标题:</label><input type="text" id="title" name="title"><br>
    内容:<br><span><textarea name="content" rows="13" cols="80" id="content"></textarea></span>
    <input type="submit" name="dosub" id="btn_sub" value="上传留言">
</div>
<script>
    var page = 1;
    var num = 8;

    function showpage(totalpage) {
        var result = "";
        //显示分页
        result = "<input type='button' id='prev' value='上一页'></input>";
        result += '当前页：第' + page + '页/总共：' + totalpage + "页";
        result += "<input type='button' id='next'value='下一页'></input>";
        $('#page').html(result);
        //单击下一页 page递增 实现翻页
        $('#next').click(function () {
            page++;
            if (page >= totalpage) {
                page = totalpage;
            }
            load(page);
        });
        //单击上一页 page递减 实现翻页
        $('#prev').click(function () {
            page--;
            if (page <= 1) {
                page = 1;
            }
            load(page);
        })
    }

    function load(page) {
        //获取内容
        let str = "";
        $.ajax({
            // async: false,
            type: 'get',
            url: 'messageshowdb.php',
            data: {page: page, num: num},
            dataType: 'json',
            success: function (data, status) {
                str = "";
                $.each(data, function (key, value) {
                    str += "<div>" + [key] + ":" + "标题:" + value.title + "-----" + "内容:" + value.content + "</div>";
                    $("#div1").html(str);
                });
            }
        });
        //获取总页数
        $.ajax({
            async: false,//设置成同步 函数内部变量 外部可以取到
            type: 'get',
            url: 'totaldb.php',
            data: {page: page, num: num},
            dataType: 'text',
            success: function (data, status) {
                totalpage = data;
            }
        });
        showpage(totalpage);
    }

    $(document).ready(load(page));
    //
    $("#btn_sub").click(function () {

        let title = $("#title").val();
        let content = $("#content").val();
        $.post("insertdb.php", {title: title, content: content}, function (data) {
            if (data) {
                alert("留言成功!");
            } else {
                alert("留言失败请重新输入!");
            }
            load(page);
        }, "text")
    })

    $("#sousou").click(function () {
        let str = "";
        let con = $("#con").val();
        let totalPage = 1;
        $.get("messageshowdb.php?content=sousou", {con: con, page: page, num: num}, function (data) {
            totalPage = data.count;
            $.each(data, function (key, value) {
                str += "<div>" + [key] + ":" + "标题:" + value.title + "-----" + "内容:" + value.content + "</div>";
                $("#div1").html(str);
            });
        }, "json");
        showpage(totalPage);
    })
</script>
</body>
</html>