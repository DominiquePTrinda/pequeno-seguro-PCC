<?php
    function funheader($check){
return "
<nav class='navbar navbar-expand-custom navbar-mainbg'>
    <span class='navbar-brand navbar-logo'>Pequeno Seguro</span>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <i class='fas fa-bars text-white'></i>
    </button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav ml-auto'>
            <div class='hori-selector'>
                <div class='left'></div>
                <div class='right'></div>
            </div>
            <li class='$check[0]'>
                <a class='nav-link' href='index.php'><i class='fas fa-home'></i>Home</a>
            </li>
            <li class='$check[1]'>
                <a class='nav-link' href='javascript:void(0);'><i class='far fa-address-book'></i>Sobre</a>
            </li>
            <li class='$check[2]'>
                <a class='nav-link' href='javascript:void(0);'><i class='far fa-clone'></i>Components</a>
            </li>
            <li class='$check[3]'>
                <a class='nav-link' href='login.php'><i class='fa fa-sign-in'></i>Entrar</a>
            </li>
            <li class='$check[4]'>
                <a class='nav-link' href='cadastro.php'><i class='far fa-user'></i>Cadastrar</a>
            </li>
        </ul>
    </div>
</nav>
";
}