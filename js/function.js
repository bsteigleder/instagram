function newfoto(id, url) {
    document.getElementById(id).src = url;
}
function pagination(next){
    url = "pagination.php?next="+next;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(ret) {
        if (xhr.readyState == 4) {
            data = JSON.parse(xhr.response);
            var div = document.getElementById('divID');
            div.innerHTML = div.innerHTML + 'Extra stuff';
            for (var i = 0; i < arrayOfObjects.length; i++) {    
                var object = arrayOfObjects[i];
           }
    // If property names are known beforehand, you can also just do e.g.
    // alert(object.id + ',' + object.Title);
}
            //alert(xhr.response);
            //document.getElementById("like_"+id).style.display="none";
        }
    }
    
    xhr.open('GET', url, true);
    xhr.send("next="+next);
}
function like(id) {
    url = "like.php?id="+id;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            alert("vc deu um Like :)");
            document.getElementById("like_"+id).style.display="none";
        }
    }
    
    xhr.open('GET', url, true);
    xhr.send("id="+id);
}

var ajax = {};
ajax.x = function() {
    if (typeof XMLHttpRequest !== 'undefined') {
        return new XMLHttpRequest();
    }
    var versions = [
        "MSXML2.XmlHttp.5.0",
        "MSXML2.XmlHttp.4.0",
        "MSXML2.XmlHttp.3.0",
        "MSXML2.XmlHttp.2.0",
        "Microsoft.XmlHttp"
    ];

    var xhr;
    for (var i = 0; i < versions.length; i++) {
        try {
            xhr = new ActiveXObject(versions[i]);
            break;
        } catch (e) {
        }
    }
    return xhr;
};

ajax.send = function(url, callback, method, data, sync) {
    var x = ajax.x();
    x.open(method, url, sync);
    x.onreadystatechange = function() {
        if (x.readyState == 4) {
            callback(x.responseText)
        }
    };
    if (method == 'POST') {
        x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }
    x.send(data)
};

ajax.get = function(url, data, callback, sync) {
    var query = [];
    for (var key in data) {
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    ajax.send(url + '?' + query.join('&'), callback, 'GET', null, sync)
};

ajax.post = function(url, data, callback, sync) {
    var query = [];
    for (var key in data) {
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    ajax.send(url, callback, 'POST', query.join('&'), sync)
};