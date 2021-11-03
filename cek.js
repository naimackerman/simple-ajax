var xmlHttp = createxmlHttpRequestObject();

function createxmlHttpRequestObject() {
    var xmlHttp;

    if (window.ActiveXObject) {
        try {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {
            xmlHttp = false;
        }
    }
    else {
        try {
            xmlHttp = new XMLHttpRequest();
        }
        catch (e) {
            xmlHttp = false;
        }
    }

    if (!xmlHttp) alert("Obyek XMLHttpRequest gagal dibuat");
    else {
        return xmlHttp;
    }
}

function process() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
        nama = encodeURIComponent(document.getElementById("namaAnda").value);
        xmlHttp.open("GET", "cek.php?nama=" + nama, true);
        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send(null);
    }
    else {
        setTimeout("process", 1000);
    }
}

function handleServerResponse() {
    if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {
            xmlResponse = xmlHttp.responseXML;
            xmlDocumentElement = xmlResponse.documentElement;
            hasil = xmlDocumentElement.firstChild.data;
            document.getElementById("respon").innerHTML = "<i>" + hasil + "</i>";
            setTimeout("process()", 1000);
        }
        else {
            alert("Terjadi masalah dalam mengakses server " + xmlHttp.statusText);
        }
    }
}