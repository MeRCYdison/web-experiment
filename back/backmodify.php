<?php
// 设置响应头为 JSON 格式
header('Content-Type: application/json');

// 获取输入的 JSON 数据
$inputData = file_get_contents('php://input');

// 检查数据是否为空
if ($inputData) {
    // 解析 JSON 数据
    $data = json_decode($inputData, true);

    // 检查数据是否成功解析
    if ($data !== null) {
        // 对输入数据进行长度验证和 XSS 过滤
        foreach ($data['contact'] as $key => $value) {
            if (strlen($value) > 25) {
                echo json_encode([
                    'success' => false,
                    'message' => "长度不能超过25个字符"
                ]);
                exit;
            }
            $data['contact'][$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }

        foreach ($data['personalDetails'] as $index => $detail) {
            if (strlen($detail['label']) > 25 || strlen($detail['value']) > 25) {
                echo json_encode([
                    'success' => false,
                    'message' => "个人详情标签或值长度不能超过25个字符"
                ]);
                exit;
            }
            $data['personalDetails'][$index]['label'] = htmlspecialchars($detail['label'], ENT_QUOTES, 'UTF-8');
            $data['personalDetails'][$index]['value'] = htmlspecialchars($detail['value'], ENT_QUOTES, 'UTF-8');
        }

        // 这里可以对数据进行处理，比如保存到数据库或文件
        // 假设我们将数据存储到一个文件中（例如：profile.json）

        // 定义存储路径
        $filePath = __DIR__ . '/../profile/profile.json';

        // 将数据写入文件
        if (file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT))) {
            echo json_encode([
                'success' => true,
                'message' => '修改成功'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => '文件保存失败'
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => '无效的JSON数据'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => '没有接收到数据'
    ]);
}
?>
