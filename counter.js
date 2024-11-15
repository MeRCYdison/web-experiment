document.addEventListener('DOMContentLoaded', function () {
    fetch('back/counter.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('visit-count').innerText = data.count;
        })
        .catch(error => {
            console.error('计数请求失败:', error);
            document.getElementById('visit-count').innerText = "加载失败";
        });
});

