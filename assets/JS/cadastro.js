var btnSenha = document.querySelector('.senha-op');
var input = document.getElementById("senha");
btnSenha.addEventListener("click", () => {
    input.type = input.type == 'text' ? 'password' : 'text';

    if (btnSenha.classList[2] == "fa-eye-slash") {
        btnSenha.classList.add("fa-eye");
        btnSenha.classList.remove("fa-eye-slash");
    } else {
        btnSenha.classList.remove("fa-eye");
        btnSenha.classList.add("fa-eye-slash");
    }
});


document.querySelector('.sexoMS').addEventListener("click", () => {
    document.querySelector('.sexoMS').classList.add('sexoCheck');
    document.querySelector('.sexoFM').classList.remove('sexoCheck');
    document.getElementById('sexoUser').value = "M";
});
document.querySelector('.sexoFM').addEventListener("click", () => {
    document.querySelector('.sexoFM').classList.add('sexoCheck');
    document.querySelector('.sexoMS').classList.remove('sexoCheck');
    document.getElementById('sexoUser').value = "F";
});

var nome = document.getElementById("nome");
var email = document.getElementById("email");
var senha = document.getElementById("senha");
var sexo = document.getElementById("sexoUser");
var sexoM = document.querySelector(".sexoMS");
var sexoF = document.querySelector(".sexoFM");
document.querySelector("form").addEventListener('submit', (event) => {
    if (validateMyForm(nome, email, senha, sexo, sexoM, sexoF)) {
        event.preventDefault();
    }
})

function validateMyForm(nome, email, senha, sexo) {
    if (verificarVazio(nome) || verificarVazio(email) || verificarVazio(senha) || verificarVazioSexo(sexo)) {
        return true;
    }
    return false;
    returnToPreviousPage();
}

function verificarVazio(valor) {
    if (valor.value == "") {
        valor.style.border = "1px solid red";
        return true;
    } else {
        valor.style.border = "0";
        return false
    }
}

function verificarVazioSexo(valor) {
    if (valor.value == "") {
        sexoM.style.border = "1px solid red";
        sexoF.style.border = "1px solid red";
        return true;
    } else {
        sexoM.style.border = "0";
        sexoF.style.border = "0";
        return false
    }
}
