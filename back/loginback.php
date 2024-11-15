<?php
// 配置数据库连接
$host = 'localhost';   // 数据库主机
$port = '3306';        // 数据库端口
$dbname = 'userdb';    // 数据库名
$username = "root";    // 数据库用户名
$password = 'qiqi999897';        // 数据库密码

// 创建数据库连接
$conn = new mysqli($host, $username, $password, $dbname, $port);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 获取前端提交的用户名和密码
$user = $_POST['username'];
$pass = $_POST['password'];

// 创建一个 SQL 查询，使用预处理语句防止 SQL 注入
$sql = "SELECT * FROM weblogin WHERE username = ? AND password = ?";

// 准备预处理语句
$stmt = $conn->prepare($sql);

// 绑定参数
$stmt->bind_param("ss", $user, $pass); // "ss" 表示两个字符串类型的参数

// 执行查询
$stmt->execute();

// 获取查询结果
$result = $stmt->get_result();

// 检查用户是否存在
header('Content-Type: application/json');
if ($result->num_rows > 0) {
    // 如果找到匹配的记录，表示登录成功
    echo json_encode(['success' => true]);
} else {
    // 如果没有找到匹配的记录，表示登录失败
    echo json_encode(['success' => false]);
}

// 关闭连接
$stmt->close();
$conn->close();
?>
