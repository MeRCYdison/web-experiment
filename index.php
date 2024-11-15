<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>个人主页</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="container">
    <!-- 个人信息部分 -->
    <section class="profile">
        <img src="profile/profile.png" alt="个人照片" class="profile-pic">
        <div class="profile-info">
            <h1>qjy</h1>
            <p class="job-title">学生</p>
            <p>求职意向：师师设计师、师师设计师</p>
            <ul class="personal-details" id="personal-details">
                <!-- 个人信息将通过JavaScript填充 -->
            </ul>
            <!-- 编辑链接 -->
            <a href="login.php" class="edit-link" style="color:inherit;text-decoration: none;"><i class="fas fa-edit"></i> 编辑</a>
            <!-- 新增的修改头像按钮 -->
            <a href="change-avatar.php" class="change-avatar-link" style="color:inherit;text-decoration: none;"><i class="fas fa-camera"></i> 更改头像</a>
        </div>
    </section>

    <!-- 网页访问计数 -->
    <section class="visit-count">
        <p>当前页面被访问次数：<span id="visit-count">加载中...</span></p>
    </section>

    <!-- 显示家乡天气 -->
    <section class="weather">
        <h2><i class="fas fa-cloud-sun"></i> 家乡天气 <i class="fas fa-sync-alt" id="refreshWeather" style="cursor: pointer;"></i></h2>
        <h4>辽宁绥中</h4>
        <p id="weather-info">加载中...</p>
    </section>

    <!-- 主内容区域，分为两列 -->
    <div class="main-content">
        <!-- 左列：教育背景和工作经验 -->
        <div class="left-column">
            <section class="section">
                <h2><i class="fas fa-graduation-cap"></i> 教育背景</h2>
                <div class="timeline">
                    <div class="timeline-item">
                        <span>2022 - 2026</span>
                        <p>中南大学 - 信息安全 (本科)</p>
                    </div>
                    <div class="timeline-item">
                        <span>2026 - ???</span>
                    </div>
                </div>
            </section>

            <section class="section">
                <h2><i class="fas fa-briefcase"></i> 工作经验</h2>
                <div class="timeline">
                    <div class="timeline-item">
                        <span>2022 - 2023</span>
                        <p>大学一年级 - 大学一年级</p>
                        <p>负责大学一年级学习</p>
                    </div>
                    <div class="timeline-item">
                        <span>2023 - 2024</span>
                        <p>大学二年级 - 大学二年级</p>
                        <p>负责大学二年级学习</p>
                    </div>
                    <div class="timeline-item">
                        <span>2024 - 2025</span>
                        <p>大学三年级 - 大学三年级</p>
                        <p>负责大学三年级学习</p>
                    </div>
                </div>
            </section>
        </div>

        <!-- 右列：专业技能和联系方式 -->
        <div class="right-column">
            <section class="skills section">
                <h2><i class="fas fa-cogs"></i> 专业技能</h2>
                <ul class="skills-list">
                    <li>Word</li>
                    <li>PPT</li>
                    <li>Excel</li>
                    <li>Vscode</li>
                    <li>Intellj</li>
                </ul>
            </section>

            <section class="contact section" id="contact-section">
                <h2><i class="fas fa-phone"></i> 联系方式</h2>
                <p><strong>电话：</strong><span id="phone"></span></p>
                <p><strong>邮箱：</strong><span id="email"></span></p>
                <p><strong>微信：</strong><span id="wechat"></span></p>
                <p><strong>地址：</strong><span id="address"></span></p>
            </section>
        </div>
    </div>
</div>

<!-- 引入访问计数和天气的 JavaScript 文件 -->
<script src="counter.js"></script>
<script src="weather.js"></script>

<script>
    // 获取 profile.json 数据并填充到页面
    fetch('/profile/profile.json')
        .then(response => response.json())
        .then(data => {
            // 填充个人信息
            const personalDetailsContainer = document.getElementById('personal-details');
            data.personalDetails.forEach(detail => {
                const li = document.createElement('li');
                li.innerHTML = `<strong>${detail.label}：</strong>${detail.value}`;
                personalDetailsContainer.appendChild(li);
            });

            // 填充联系方式
            document.getElementById('phone').textContent = data.contact.phone;
            document.getElementById('email').textContent = data.contact.email;
            document.getElementById('wechat').textContent = data.contact.wechat;
            document.getElementById('address').textContent = data.contact.address;
        })
        .catch(error => console.error('加载profile.json失败:', error));
</script>
<script>
    if (window.location.search.indexOf('noCache') === -1) {
        window.location.search += (window.location.search ? '&' : '?') + 'noCache=' + new Date().getTime();
    }
</script>
</body>
</html>
