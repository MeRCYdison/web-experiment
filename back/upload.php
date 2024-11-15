<?php
// 设置响应头为 JSON 格式
header('Content-Type: application/json');

// 定义存储路径
$destination = __DIR__ . '/../profile/profile.png';

// 检查文件上传错误
if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode([
        'success' => false,
        'message' => '文件上传错误'
    ]);
    exit;
}

// 获取上传的文件信息
$fileInfo = getimagesize($_FILES['file']['tmp_name']);
if (!$fileInfo) {
    echo json_encode([
        'success' => false,
        'message' => '无效的文件类型'
    ]);
    exit;
}

// 检查文件类型
if ($fileInfo['mime'] !== 'image/jpeg' && $fileInfo['mime'] !== 'image/png') {
    echo json_encode([
        'success' => false,
        'message' => '只支持 JPG 或 PNG 格式的文件'
    ]);
    exit;
}

// 将文件转换为 PNG 并保存
$image = null;
if ($fileInfo['mime'] === 'image/jpeg') {
    $image = imagecreatefromjpeg($_FILES['file']['tmp_name']);
} elseif ($fileInfo['mime'] === 'image/png') {
    $image = imagecreatefrompng($_FILES['file']['tmp_name']);
}

if ($image && imagepng($image, $destination)) {
    imagedestroy($image);
    echo json_encode([
        'success' => true,
        'message' => '文件上传成功并转换为 PNG 格式'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => '文件保存失败'
    ]);
}
?>
