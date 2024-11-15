<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>编辑个人信息</title>
    <link rel="stylesheet" href="modify.css">
    <script src="modify.js"></script>
</head>
<body>
<div class="container">
    <section class="profile">
        <h1>编辑个人信息</h1>
        <form action="modify.php" method="POST" id="profile-form">
            <h2>联系方式</h2>
            <div id="contact-fields">
                <div class="contact-item">
                    <label for="phone">电话</label>
                    <input type="text" name="phone" id="phone" value="123456789">
                </div>
                <div class="contact-item">
                    <label for="email">邮箱</label>
                    <input type="email" name="email" id="email" value="email@email.com">
                </div>
                <div class="contact-item">
                    <label for="wechat">微信</label>
                    <input type="text" name="wechat" id="wechat" value="weixin123456789">
                </div>
                <div class="contact-item">
                    <label for="address">地址</label>
                    <input type="text" name="address" id="address" value="中国中国">
                </div>
            </div>
            <h2>个人详情(不支持输入& < > " ')</h2>
            <ul class="personal-details" id="personal-details">
                <!-- 列表项将在这里动态填充 -->
            </ul>

            <div class="form-box">
                <label for="newLabel">新列名：</label>
                <input type="text" id="newLabel">
                <label for="newValue">内容：</label>
                <input type="text" id="newValue">
                <button type="button" id="addDetailButton">添加新项</button>
            </div>
            <div class="form-box">
                <label for="deleteIndex">删除索引（数字）：</label>
                <input type="number" id="deleteIndex" min="1">
                <button type="button" id="deleteDetailButton">删除项</button>
            </div>

            <button type="button" id="saveChangesButton" style="float:right">保存修改</button>
        </form>
    </section>
</div>
<script>
    if (window.location.search.indexOf('noCache') === -1) {
        window.location.search += (window.location.search ? '&' : '?') + 'noCache=' + new Date().getTime();
    }
</script>
</body>
</html>
