document.addEventListener('DOMContentLoaded', function() {
    // 获取表单元素
    const loginForm = document.getElementById('loginForm');

    // 监听表单提交事件
    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); // 阻止表单默认提交行为

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // 创建payload数据
        const formData = new FormData();
        formData.append('username', username);
        formData.append('password', password);


        fetch('/back/loginback.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // 登录成功
                    window.location.href = 'modify.php';
                } else {
                    // 登录失败
                    alert('用户名或密码错误');
                }
            })
            .catch(error => {
                console.error('请求错误:', error);
                alert('登录失败，请稍后再试');
            });
    });
});
