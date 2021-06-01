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

var email = document.getElementById("email");
var senha = document.getElementById("senha");
document.querySelector("form").addEventListener('submit', (event) => {
    if (validateMyForm(email, senha)) {
        event.preventDefault();
    }
})

function validateMyForm(email, senha) {
    if (verificarVazio(email) || verificarVazio(senha)) {
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

