<!DOCTYPE>
<html>
<head>
<title>浙江大学吧2013级预科生迎新会报名</title>
<meta http-equiv="Content-Type" CONTENT="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="/static/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/static/bootstrap-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="/static/richard.css" />
<script src="/static/jquery.js"></script>
<script src="/static/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $("#logout").click(function(e){
        e.preventDefault();
        window.location.href="http://richardzjutieba.sinaapp.com/index.php/tieba/logout";
    });
});

</script>
</head>
<body>
<div class="empty"></div>
<div class="container-fluid">
      <div class="row-fluid">
            <div class="span6 offset3 well shabby center-pills">
                <form class="form-horizontal" method="post" autocomplete = "off">
                    <div class="alert">你需要使用支持JavaScript的浏览器才可以正确使用全部功能</div>
                    <div class="control-group">
                        <label class="control-label" for="username">用户ID</label>
                        <div class="controls">
                            <input type="text" id="username" name="username" placeholder="username" value="<?=$content->username?>" disabled/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="name">真实姓名</label>
                        <div class="controls">
                            <input type="text" id="name" name="name" placeholder="姓名" autocomplete = "off" value="<?=$content->name?>"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email">电子邮箱</label>
                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="email" autocomplete = "off" value="<?=$content->email?>"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="phone">手机号</label>
                        <div class="controls">
                            <input type="text" id="phone" name="phone" placeholder="phone" autocomplete = "off" value="<?=$content->phone?>"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="phone">专业、大类</label>
                        <div class="controls">
                            <input type="text" id="major" name="major" placeholder="major" autocomplete = "off" value="<?=$content->major?>"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-primary">提交</button>
                            <button class="btn btn-warning" id="logout">退出</button>
                        </div>
                    </div>
                    <?php
                        if ($post)
                            echo '<div class="alert alert-success">你的修改已经成功保存</div>';
                    ?>
                    
                </form>
                <center>本网站由Richard编写并负责维护，从技术层面，已经尽最大可能性保护了您的个人信息，但仍无法保证由于入侵等意外因素导致数据被盗或被清空。如有疑问，请发邮件至 richard9372@gmail.com 联系</center>
        </div>
    </div>
</div>
</body>