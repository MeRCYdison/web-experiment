// 高德天气 API 密钥
const apiKey = '02f993d0176d3e92b6770ca26325730c';
const cityCode = '211421';  // 使用城市的adcode（城市编码）

// 获取天气信息
function fetchWeather() {
    document.getElementById('weather-info').innerHTML = '加载中...';  // 重置加载提示
    const url = `https://restapi.amap.com/v3/weather/weatherInfo?city=${cityCode}&key=${apiKey}&extensions=base&output=JSON`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.status === '1') {
                const weather = data.lives[0];
                const weatherInfo = `<br>天气：${weather.weather}<br>气温：${weather.temperature}°C<br>风向：${weather.winddirection}<br>风力：${weather.windpower}级<br>`;
                document.getElementById('weather-info').innerHTML = weatherInfo;
            } else {
                document.getElementById('weather-info').innerHTML = '无法获取天气信息';
            }
        })
        .catch(error => {
            console.error('获取天气信息失败:', error);
            document.getElementById('weather-info').innerHTML = '获取天气信息失败';
        });
}

// 页面加载完成后调用fetchWeather
window.onload = fetchWeather;

// 点击图标时重新加载天气
document.getElementById('refreshWeather').addEventListener('click', fetchWeather);
