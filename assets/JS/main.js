document.querySelector(".OpenNav-nav").addEventListener("click", () => {
    document.querySelector(".grup-nav").classList.add("grupOpen-nav");
    document.querySelector("body").classList.add("bodyHidden");
});
document.querySelector(".CloseNav-nav").addEventListener("click", () => {
    document.querySelector(".grup-nav").classList.remove("grupOpen-nav");
    document.querySelector("body").classList.remove("bodyHidden");
});
document.querySelector(".container-header").addEventListener("click", () => {
    document.querySelector(".grup-nav").classList.remove("grupOpen-nav");
});
document.querySelector(".container").addEventListener("click", () => {
    document.querySelector(".grup-nav").classList.remove("grupOpen-nav");
});


var totalFoto = 4;
var atualFoto = 1;

function foto(posicao) {
    let foto = "./assets/IMG/BANNER/bg" + posicao + ".jpg"
    document.querySelector("header").style.backgroundImage = `url(${foto})`;
}
document.querySelector('.voltar-foto').addEventListener('click', () => {
    if (atualFoto > 1) {
        atualFoto--;
        foto(atualFoto);
    } else {
        atualFoto = totalFoto;
        foto(atualFoto);
    }
});
document.querySelector('.proxima-foto').addEventListener('click', () => {
    if (atualFoto < totalFoto) {
        atualFoto++;
        foto(atualFoto);
    } else {
        atualFoto = 1;
        foto(atualFoto)
    }
});

setInterval(() => {
    if (atualFoto < totalFoto) {
        atualFoto++;
        foto(atualFoto);
    } else {
        atualFoto = 1;
        foto(atualFoto)
    }
}, 10000);
foto(1);

document.querySelector(".openVideo").addEventListener("click", ()=>{
    document.querySelector(".video-youtube").style.display = "block";
    document.querySelector("body").style.overflow = "hidden";
    document.querySelector('.videoYoutube').src = "https://www.youtube-nocookie.com/embed/L3lt7Juutzw";
});

document.querySelector(".closeVideo").addEventListener("click", ()=>{
    document.querySelector(".video-youtube").style.display = "none";
    document.querySelector("body").style.overflow = "auto";
    document.querySelector('.videoYoutube').src = "";
});