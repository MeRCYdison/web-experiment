<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更改头像</title>
    <link rel="stylesheet" href="change-avatar.css">
    <script src="upload-check.js"></script>
    <script src="upload-avatar.js"></script> <!-- 新增的 JavaScript 文件 -->
</head>
<body>
<div class="container">
    <h1>更改头像</h1>
    <form id="avatarForm" enctype="multipart/form-data">
        <label for="avatar">选择新的头像图片:</label>
        <input type="file" name="avatar" id="avatar" accept="image/*" required>
        <button type="submit">上传</button>
    </form>
    <br>
    <p id="message">请上传小于2mB的jpg/png文件</p> <!-- 用于显示返回消息的元素 -->
</div>
</body>
</html>
