
var reader = new FileReader();

document.querySelector('#file2').addEventListener('change', function () {
    var imagem = document.querySelector('#file2').files[0];
    var preview = document.querySelector('.imagem2');
    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (imagem) {
        reader.readAsDataURL(imagem);
    } else {
        preview.src = "";
    }
})

document.querySelector('#file').addEventListener('change', function () {
    var imagem = document.querySelector('#file').files[0];
    var preview = document.querySelector('.imagem');
    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (imagem) {
        reader.readAsDataURL(imagem);
    } else {
        preview.src = "";
    }
})
document.querySelector('#filePostar').addEventListener('change', function () {
    var imagem = document.querySelector('#filePostar').files[0];
    var preview = document.querySelector('.imagempostar');
    reader.onloadend = function () {
        preview.src = reader.result;
        preview.classList.add("imagempostar-m");
    }

    if (imagem) {
        reader.readAsDataURL(imagem);
    } else {
        preview.src = "";
    }
})
document.querySelector(".icone-upload-foto").addEventListener('click', () => {
    document.querySelector('.btnEnviar-perfil').classList.add('btnEnviar-perfil-m');
    document.querySelector(".icone-upload-foto").classList.add('noneDisplay')
});
document.querySelector(".btnEnviar-perfil").addEventListener('click', () => {
    document.querySelector('.btnEnviar-perfil').classList.remove('btnEnviar-perfil-m');
    document.querySelector(".icone-upload-foto").classList.remove('noneDisplay');
    var imagem = document.querySelector('#file').files[0];
    //var preview = document.querySelector('.imagem');
    var preview = document.querySelector('.perfil-foto-icone');
    var preview2 = document.querySelector('.perfil-foto-icone2');
    var preview3 = document.querySelectorAll('.fotoPerfil-postagem');
    reader.onloadend = function () {
        preview.src = reader.result;
        preview2.src = reader.result;
        for(var i = 0; i<preview3.length; i++){
            preview3[i].src = reader.result;
        }
    }

    if (imagem) {
        reader.readAsDataURL(imagem);
    } else {
        preview2.src = "";
    }
});

window.onload = function(){
    let deletePost = document.querySelectorAll(".delete-pub")

    for(let deletePostF of deletePost){
        deletePostF.addEventListener('click',deleter);
    }
    function deleter(e){
        let t = e.target
        let z = t.children[0]
        z.classList.toggle('corpo-delete-pub-m')
    }
}

document.querySelector(".icone-upload-foto-capa").addEventListener('click', () => {
    document.querySelector(".icone-upload-foto-capa").classList.add('noneDisplay');
    document.querySelector(".buttonSalvarCapa").classList.add("buttonSalvarCapa-m");
});
function sendFotoClose(){
    document.querySelector(".buttonSalvarCapa").classList.remove("buttonSalvarCapa-m");
    document.querySelector(".icone-upload-foto-capa").classList.remove('noneDisplay');
}
function sendFoto() {
    $.ajax({
        name: 'foto_us',
        url: 'foto_perfil.php',
        method: 'POST',
        dataType: 'json',
        type: "POST",
        processData: false,
        contentType: false,
        data: new FormData($('#myForm')[0]),
        cache: false,
        success: function (response) {
            if (response.status == "success") {
                console.log("Email Has Been Sent!");
            } else {
                console.log("Please Try Again");
                console.log(response);
            }
        }
    });
}
function sendFoto2() {
    $.ajax({
        name: 'capa_us',
        url: 'foto_capa.php',
        method: 'POST',
        dataType: 'json',
        type: "POST",
        processData: false,
        contentType: false,
        data: new FormData($('#myForm2')[0]),
        cache: false,
        success: function (response) {
            if (response.status == "success") {
                console.log("Email Has Been Sent!");
            } else {
                console.log("Please Try Again");
                console.log(response);
            }
        }
    });
    document.querySelector(".buttonSalvarCapa").classList.remove("buttonSalvarCapa-m");
    document.querySelector(".icone-upload-foto-capa").classList.remove('noneDisplay');
}

var bioadd = document.querySelector(".add-desc-oculto");
var cityadd = document.querySelector(".add-desc-oculto-city");
var ensinoadd = document.querySelector(".add-desc-oculto-ensino");
document.querySelector(".add-desc").addEventListener("click", () => {
    document.querySelector(".bio-conteudo-span").classList.toggle("noneDisplay");
    document.querySelector(".city-conteudo-span").classList.remove("noneDisplay");
    document.querySelector(".ensino-conteudo-span").classList.remove("noneDisplay");

    bioadd.classList.toggle("add-desc-mostrar");
    cityadd.classList.remove("add-desc-mostrar");
    ensinoadd.classList.remove("add-desc-mostrar");

    if (bioadd.classList[1] === "add-desc-mostrar") {
        document.querySelector(".add-texto-bio").innerHTML = "Fechar Biografia";
    } else {
        document.querySelector(".add-texto-bio").innerHTML = "Adicionar Biografia";
    }
});
document.querySelector(".add-desc-city").addEventListener("click", () => {
    document.querySelector(".city-conteudo-span").classList.toggle("noneDisplay");
    document.querySelector(".bio-conteudo-span").classList.remove("noneDisplay");
    document.querySelector(".ensino-conteudo-span").classList.remove("noneDisplay");

    cityadd.classList.toggle("add-desc-mostrar");
    bioadd.classList.remove("add-desc-mostrar");
    ensinoadd.classList.remove("add-desc-mostrar");

    if (cityadd.classList[1] === "add-desc-mostrar") {
        document.querySelector(".add-texto-city").innerHTML = "Fechar Cidade";
    } else {
        document.querySelector(".add-texto-city").innerHTML = "Adicionar Cidade";
    }
});
document.querySelector(".add-desc-ensino").addEventListener("click", () => {
    document.querySelector(".ensino-conteudo-span").classList.toggle("noneDisplay");
    document.querySelector(".bio-conteudo-span").classList.remove("noneDisplay");
    document.querySelector(".city-conteudo-span").classList.remove("noneDisplay");

    ensinoadd.classList.toggle("add-desc-mostrar");
    bioadd.classList.remove("add-desc-mostrar");
    cityadd.classList.remove("add-desc-mostrar");

    if (ensinoadd.classList[1] === "add-desc-mostrar") {
        document.querySelector(".add-texto-ensino").innerHTML = "Fechar Ensino";
    } else {
        document.querySelector(".add-texto-ensino").innerHTML = "Adicionar Ensino";
    }
});