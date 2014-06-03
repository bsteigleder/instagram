function newfoto(id, url) {
    showLoader();
    document.getElementById(id).src = url;
    
}
function hideLoader(){
    document.getElementById("loader").style.display="none";
}

function showLoader(){
    document.getElementById("loader").style.display="block";
}
function pagination(next) {
    showLoader();
    url = "pagination.php?next=" + next;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(ret) {
        if (xhr.readyState == 4) {
            data = JSON.parse(xhr.response);
            
            var div = document.getElementById('all');
            for (var i = 0; i < data.data.length; i++) {
                var object = data.data[i];
                console.log(object);
                var novo= "<div class='col-md-6 col-md-offset-3 box img-rounded'>";
                        novo+="<p>"+object.user.full_name+" ( "+object.user.username+" ):</p>";
                        novo+="<img onload='hideLoader();' id='"+object.id+"' src='"+object.images.thumbnail.url+"' class='img-rounded' alt=''><br>";
                        novo+="<p class='btn' onclick='newfoto(\""+object.id+"\", \""+object.images.thumbnail.url+"\")'>Min</p>";
                        novo+="<p class='btn' onclick='newfoto(\""+object.id+"\", \""+object.images.low_resolution.url+"\")'>Med</p>";
                        novo+="<p class='btn' onclick='newfoto(\""+object.id+"\", \""+object.images.standard_resolution.url+"\")'>Max</p>";
                        novo+="<br>";
                        novo+="<br>";
                        novo+="<p class='btn' id='like_"+object.id+"' onclick='like(\""+object.id+"\")'>S2</p>";
                        novo+="<p><b>Likes: </b>"+object.likes.count+"</p>";
                        novo+="<p></p>";
                        novo+="<p><b>comments: </b>"+object.comments.count+"</p>";
                    novo+="</div>";
                    div.innerHTML = div.innerHTML + novo;
            }
            
            var element = document.getElementById("pagina");
            paginacao="<p class='btn teste'   style='width: 130px' onclick='pagination(\""+data.pagination.next_max_id+"\")' >Carregar mais</p>";
            //element.parentNode.removeChild(element);
            element.innerHTML = paginacao;
            // If property names are known beforehand, you can also just do e.g.
            // alert(object.id + ',' + object.Title);
            hideLoader();
        }
        //alert(xhr.response);
        //document.getElementById("like_"+id).style.display="none";

    }

    xhr.open('GET', url, true);
    xhr.send("next=" + next);
    
}
function like(id) {
    url = "like.php?id=" + id;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            alert("vc deu um Like :)");
            document.getElementById("like_" + id).style.display = "none";
        }
    }

    xhr.open('GET', url, true);
    xhr.send("id=" + id);
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