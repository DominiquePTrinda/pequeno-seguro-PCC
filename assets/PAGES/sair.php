<?php
setcookie("logado", "", time(), "/");
setcookie("codlogado", "", time(),"/");
unset($_COOKIE["logado"]);
unset($_COOKIE["codlogado"]);
header("location: ../../index.php");