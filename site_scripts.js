function getXmlHttp() {
    let xmlHttp = false;
    try {
        xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e2) {
            xmlHttp = false;
        }
    }

    if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
        xmlHttp = new XMLHttpRequest();
    }

    return xmlHttp;
}

function updatePage() {
    if (xmlhttp.readyState == 4) {
        if (xmlhttp.status == 200) {
            let response = xmlhttp.responseText;
            if (response == 'SUCCESS') {
                let status = document.getElementById("status");
                status.innerHTML = 'успешно отправлено';
                status.classList.toggle('status_hide');
                status.classList.toggle('status_show');
                setTimeout(function() {
                    status.classList.toggle('status_hide');
                }, 2000);
                queryLastId();
//                addMessage();
            } else {
                document.getElementById("messages").innerHTML = response;
            }
        }
    }
}
/*
function addMessage() {
    let message_list = document.getElementById("message_list");

    let newMessage = document.createElement("li");
    var now = new Date();
    newMessage.textContent = now;

    message_list.insertBefore(newMessage, message_list.firstChild);

}
*/
function updateMessagesProcess() {
    if (xmlhttp.readyState == 4) {
        if (xmlhttp.status == 200) {
            let message_list = document.getElementById("message_list");
            let response = JSON.parse(xmlhttp.responseText);

            message_list.innerHTML = "";
            response.forEach(function(item, i, response) {
                let li = document.createElement("li");
                let d = document.createElement("div");
                d.classList.add("container");
                d.classList.add("clearfix");
                let t = document.createElement("div");
                t.classList.add("time");
                t.textContent = item.time;
                d.appendChild(t);
                let e = document.createElement("div");
                e.classList.add("email");
                e.textContent = item.email;
                d.appendChild(e);
                let u = document.createElement("div");
                u.classList.add("user");
                u.textContent = item.user;
                d.appendChild(u);
                let m = document.createElement("div");
                m.classList.add("message");
                m.textContent = item.message;
                d.appendChild(m);
                li.appendChild(d);
                message_list.insertBefore(li, message_list.firstChild);
            });
            
        }
    }
}

function updateLastId() {
    if (xmlhttp.readyState == 4) {
        if (xmlhttp.status == 200) {
            let last = document.getElementById("last");
            let lastId = xmlhttp.responseText;

            if (last.value != lastId) {
                updateMessages();
                last.value = lastId;
            }
        }
    }
}