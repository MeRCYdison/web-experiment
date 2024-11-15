<?php
// 计数文件路径
$file = "counter.txt";

// 如果文件不存在，创建并初始化为0
if (!file_exists($file)) {
    file_put_contents($file, "0");
}

// 读取当前计数值
$count = (int)file_get_contents($file);

// 增加计数并更新文件
$count++;
file_put_contents($file, $count);
// 返回计数值为JSON格式
header('Content-Type: application/json');
echo json_encode(['count' => $count]);
?>
