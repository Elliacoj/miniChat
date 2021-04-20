const buttonChat = document.querySelector("#buttonChat");

buttonChat.addEventListener('click', function (e) {
    e.preventDefault();
    const content = document.getElementById("message").value;

    if(content) {
        let xhr = new XMLHttpRequest();
        const message = {
            'content': content,
        };

        xhr.open('POST', '/api/message/index.php');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify(message));
    }
    document.getElementById("message").value = "";
})

setInterval(function () {
    let xhr = new XMLHttpRequest();
    xhr.onload = function() {
        const divChat = document.getElementById("chatContent");
        const messages = JSON.parse(xhr.responseText);
        divChat.innerHTML = '';
        for(let message of messages) {
            divChat.innerHTML += "<p style='margin-left: 2%;'><span style='color: red;'>" + message['datetime'] + "/ </span><span style='color: blue;'>" + message['user'] + "</span>: " + message['content'] + "</p><br>";

       }
    };

    xhr.open('GET', '/api/message/index.php');
    xhr.send();
}, 1000);