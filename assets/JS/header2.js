//menu
document.querySelector(".menu").addEventListener('click', ()=>{
    document.querySelector(".navegacao-conteudo").classList.add("MmenuCell");
});
document.querySelector(".menu-cell").addEventListener('click', ()=>{
    document.querySelector(".navegacao-conteudo").classList.remove("MmenuCell");
    document.querySelector(".mensagem-conteudo").classList.remove("XconfC");
    document.querySelector(".notificacoes-conteudo").classList.remove("XconfC");
    document.querySelector(".configuracoes-conteudo").classList.remove("XconfC");
    document.querySelector(".notificacoes").classList.remove("XconfCZindex");
    document.querySelector(".mensagem").classList.remove("XconfCZindex");
});
//abrir as configurações
document.querySelector(".configuracoes").addEventListener('click', ()=>{
    document.querySelector(".configuracoes-conteudo").classList.toggle("XconfC");
    document.querySelector(".mensagem-conteudo").classList.remove("XconfC");
    document.querySelector(".notificacoes-conteudo").classList.remove("XconfC");
});
document.querySelector("#container").addEventListener('click', ()=>{
    document.querySelector(".configuracoes-conteudo").classList.remove("XconfC");
});
//abrir as notificações
document.querySelector(".notificacoes").addEventListener('click', ()=>{
    document.querySelector(".notificacoes-conteudo").classList.toggle("XconfC");
    document.querySelector(".notificacoes").classList.toggle("XconfCZindex");
    document.querySelector(".mensagem-conteudo").classList.remove("XconfC");
    document.querySelector(".configuracoes-conteudo").classList.remove("XconfC");
});
document.querySelector("#container").addEventListener('click', ()=>{
    document.querySelector(".notificacoes-conteudo").classList.remove("XconfC");
    document.querySelector(".notificacoes").classList.remove("XconfCZindex");
    document.querySelector(".mensagem").classList.remove("XconfCZindex");
});
//abrir as mensagens (CHAT)
document.querySelector(".mensagem").addEventListener('click', ()=>{
    document.querySelector(".mensagem-conteudo").classList.toggle("XconfC");
    document.querySelector(".mensagem").classList.toggle("XconfCZindex");
    document.querySelector(".notificacoes-conteudo").classList.remove("XconfC");
    document.querySelector(".configuracoes-conteudo").classList.remove("XconfC");
});
document.querySelector("#container").addEventListener('click', ()=>{
    document.querySelector(".mensagem-conteudo").classList.remove("XconfC");
    document.querySelector(".notificacoes").classList.remove("XconfCZindex");
    document.querySelector(".mensagem").classList.remove("XconfCZindex");
});
