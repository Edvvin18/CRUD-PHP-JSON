function _i(id){
    return document.getElementById(id)
}

function hidemsg(){
    window.settimeout(function(){
        _i("msg").style.display = "none"
    },4000)
}

function fetch(){
    let data = new FormData()
    data.append('fetch', 'yes')
    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4){
            _i("result").innerHTML = ""
            _i("result").innerHTML = xhr.responseText
        }
    }
    xhr.open('POST','ajax.php')
    xhr.send(data)
}

function addnew(){
    let data = new FormData()
    data.append('add', 'yes')
    data.append('id', _i("id").innerHTML)
    data.append('nome', _i("nome").innerHTML)
    data.append('sobrenome', _i("sobrenome").innerHTML)
    data.append('datan', _i("datan").innerHTML)
    data.append('email', _i("email").innerHTML)
    data.append('endereco', _i("endereco").innerHTML)
    data.append('contacto', _i("contacto").innerHTML)

    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function(){
        fetch();
        if(xhr.readyState === 4){
            _i("msg").style.display = "block"
            _i("msg").innerHTML = xhr.responseText
        }
    }
    xhr.open('POST','ajax.php')
    xhr.send(data)
    hidemsg()
}

function del(id){
    let data = new FormData()
    data.append('del', 'yes')
    data.append('id',id)
    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function(){
        fetch();
        if(xhr.readyState === 4){
            _i("msg").style.display = "block"
            _i("msg").innerHTML = xhr.responseText
        }
    }
    xhr.open('POST','ajax.php')
    xhr.send(data)
    hidemsg()

}


function cancelnew(){
    _i('id').innerHTML = ""
    _i('nome').innerHTML = ""
    _i('datan').innerHTML = ""
    _i('email').innerHTML = ""
    _i('endereco').innerHTML = ""
    _i('contacto').innerHTML = ""
}

function edit(id){
    let data = new FormData()
    var id = "id" + id
    var nm = "nome" + id
    var dtn = "datan" + id
    var eml = "email" + id
    var end = "endereco" + id
    var cnt = "contacto" + id

    data.append('edit', 'yes')
    data.append('id', id)

    data.append('id', _i(id).innerHTML)
    data.append('nome', _i(nm).innerHTML)
    data.append('datan', _i(dtn).innerHTML)
    data.append('email', _i(eml).innerHTML)
    data.append('endereco', _i(end).innerHTML)
    data.append('contacto', _i(cnt).innerHTML)

    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function(){
        fetch();
        if(xhr.readyState === 4){
            _i("msg").style.display = "block"
            _i("msg").innerHTML = xhr.responseText
        }
    }
    xhr.open('POST','ajax.php')
    xhr.send(data)
    hidemsg()
}
