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
                setTimeout(function(){
                    status.classList.toggle('status_hide');
                }, 2000);
            } else {
                document.getElementById("messages").innerHTML = response;
            }    
        }
    }
}