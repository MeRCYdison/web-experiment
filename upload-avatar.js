document.addEventListener('DOMContentLoaded', function() {
    const avatarForm = document.getElementById('avatarForm');
    const message = document.getElementById('message');

    avatarForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const fileInput = document.getElementById('avatar');
        const file = fileInput.files[0];

        if (!file) {
            message.textContent = '请选择一个文件';
            return;
        }

        // 创建 FormData 对象
        const formData = new FormData();
        formData.append('file', file);

        // 发送 fetch 请求
        fetch('/back/upload.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    message.textContent = '图片上传成功';
                } else {
                    message.textContent = '上传失败: ' + data.message;
                }
            })
            .catch(error => {
                console.error('错误:', error);
                message.textContent = '上传过程中出错，请稍后重试';
            });
    });
});
