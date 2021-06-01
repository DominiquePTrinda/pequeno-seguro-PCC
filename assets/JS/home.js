
var reader = new FileReader();

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
function curtirFoto() {
    $.ajax({
        name: 'curtida',
        url: 'curtidas.php',
        method: 'POST',
        dataType: 'json',
        type: "POST",
        processData: false,
        contentType: false,
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