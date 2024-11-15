document.addEventListener('DOMContentLoaded', function() {
    function addInputLengthLimit(input) {
        input.addEventListener('input', function() {
            // 设置长度限制为10
            if (input.value.length > 25) {
                input.value = input.value.slice(0, 25);
                alert('输入长度不能超过25个字符');
            }
        });
    }

    // 为页面初始加载的所有 input 标签添加长度限制
    document.querySelectorAll('input').forEach(addInputLengthLimit);

    document.getElementById('addDetailButton').addEventListener('click', addDetail);
    document.getElementById('deleteDetailButton').addEventListener('click', deleteDetail);
    document.getElementById('saveChangesButton').addEventListener('click', saveChanges);

    // 获取 profile.json 数据并填充到页面
    fetch('/profile/profile.json')
        .then(response => response.json())
        .then(data => {
            // 填充个人信息
            const personalDetailsContainer = document.getElementById('personal-details');
            data.personalDetails.forEach((detail, index) => {
                const li = document.createElement('li');
                li.innerHTML = `<span>${index + 1}. ${detail.label}：</span><input type="text" name="${detail.label}" value="${detail.value}">`;
                personalDetailsContainer.appendChild(li);

                // 为新创建的 input 标签添加长度限制
                const input = li.querySelector('input');
                addInputLengthLimit(input);
            });

            // 填充联系方式
            document.getElementById('phone').value = data.contact.phone;
            document.getElementById('email').value = data.contact.email;
            document.getElementById('wechat').value = data.contact.wechat;
            document.getElementById('address').value = data.contact.address;
        })
        .catch(error => console.error('加载profile.json失败:', error));
});

function addDetail() {
    const ul = document.getElementById('personal-details');
    const newLabel = document.getElementById('newLabel').value;
    const newValue = document.getElementById('newValue').value;

    if (newLabel.length > 25 || newValue.length > 25) {
        alert("新列名和内容长度不能超过25！");
        return;
    }
    if (newLabel.trim() === "" || newValue.trim() === "") {
        alert("新列名和内容不能为空！");
        return;
    }

    const li = document.createElement('li');
    li.innerHTML = `<span></span><input type="text" name="${newLabel}" value="${newValue}">`;
    ul.appendChild(li);



    updateListIndexes();
}

function updateListIndexes() {
    const ul = document.getElementById('personal-details');
    const items = ul.getElementsByTagName('li');

    for (let i = 0; i < items.length; i++) {
        const span = items[i].querySelector('span');
        const input = items[i].querySelector('input');
        if (span && input) {
            span.innerText = `${i + 1}. ${input.name}：`;
        }
    }
}

function deleteDetail() {
    const ul = document.getElementById('personal-details');
    const index = parseInt(document.getElementById('deleteIndex').value);

    if (index >= 1 && index <= ul.children.length) {
        ul.removeChild(ul.children[index - 1]);
        updateListIndexes();
    } else {
        alert("无效的索引，索引应在 1 到 " + ul.children长度 + " 之间");
    }
}

function saveChanges() {
    const ul = document.getElementById('personal-details');
    const personalDetails = Array.from(ul.children).map((li, index) => {
        const span = li.querySelector('span').innerText;
        const value = li.querySelector('input').value;
        return { label: span.slice(3, -1), value };
    });

    const contactFields = {};
    document.querySelectorAll('.contact-item input').forEach(item => {
        contactFields[item.name] = item.value;
    });

    const data = {
        contact: contactFields,
        personalDetails: personalDetails
    };

    fetch('/back/backmodify.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('修改成功');
            } else {
                alert('修改失败');
            }
        })
        .catch(error => {
            console.error('请求错误:', error);
            alert('请求失败，请稍后再试');
        });
}
