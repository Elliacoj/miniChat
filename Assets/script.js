let divChat = document.getElementById("chat");
let buttonChat = document.querySelector("#buttonChat");

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


function listMessages(students, table) {
    for(let student of students) {
        table.innerHTML += `
                <tr>
                    <td>${student.id}</td>
                    <td>${student.firstname}</td>
                    <td>${student.lastname}</td>
                    <td>${student.school.name}</td>
                    <td>
                        <a class="get-student" href="/api/students?id=${student.id}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            `;
    }
}

setInterval(function () {

}, 1000);