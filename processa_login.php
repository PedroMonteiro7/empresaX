<?php

session_start();

require("./funcoes.php");

//recebendo os dados do formulário:
if(isset($_POST["txt_usuario"]) || isset($_POST["txt_senha"])) {

    $usuario = $_POST["txt_usuario"];
    $senha = $_POST["txt_senha"];

    realizarLogin($usuario, $senha, lerArquivo("usuarios.json"));

} elseif ($_GET["logout"]) {
    
    finalizarLogin();

}

