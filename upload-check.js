document.getElementById('avatar').addEventListener('change', function(event) {
    // 获取选中的文件
    var file = event.target.files[0];

    // 检查文件类型
    if (!file.type.match('image/jpeg') && !file.type.match('image/png')) {
        alert('请选择一个有效的 JPG 或 PNG 图片文件.');
        event.target.value = ''; // 清空选择的文件
        return;
    }

    // 检查文件大小（例如，限制为2MB）
    var maxSize = 2 * 1024 * 1024;
    if (file.size > maxSize) {
        alert('文件大小不能超过2MB.');
        event.target.value = ''; // 清空选择的文件
        return;
    }

    // 通过验证后的操作
    console.log('文件已通过验证:', file);
});
