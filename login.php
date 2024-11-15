<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>
    <link rel="stylesheet" href="login.css">
    <script src="login.js" defer></script>
</head>
<body>
<div class="container">
    <section class="login-form">
        <h1>欢迎登录</h1>
        <form id="loginForm">
            <div class="form-group">
                <label for="username">用户名</label>
                <input type="text" id="username" name="username" placeholder="请输入用户名" required>
            </div>

            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" id="password" name="password" placeholder="请输入密码" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-submit">登录</button>
            </div>

            <div class="form-footer">
                <p>没有账号？请联系管理员注册</p>
            </div>
        </form>
    </section>
</div>
</body>
</html>
