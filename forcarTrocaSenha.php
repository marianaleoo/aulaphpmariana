<?php 
include "usuarios.php";

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
    $sessionData = $_SESSION["dados"][0];
}

if(isset($_POST['f_mail']) and isset($_POST['f_senha'])){
    $user = new usuarios();
    $user->setId($sessionData->id);
    $user->setNome($sessionData->nome);
    $user->setEmail($sessionData->email);
    $user->setSenha($_POST['f_senha']);
    $teste = $user->update($user->getId());
    Header("Location:cadastro.php");
}else{
    exibe_pagina("preencha a nova senha", $sessionData);
}

function exibe_pagina($mensagem, $sessionData){
    echo "<html>";
    echo "<head>";
    echo "<title>Troca de senha</title>";
    echo "</head>";
    echo "<body>";
    echo "<b>";
    echo "<p align=center>";
    echo "<img src='login.png' height=160 width=400>";
    echo "</p>";
    echo '<p>'.$mensagem.'</p>';
    echo "<div align=center>";
    echo "<form method=POST action=$_SERVER[PHP_SELF]>";
    echo "<H2>Email: <input type=text name=f_mail readonly value=".$sessionData->email."></H2>";
    echo "<br/>";
    echo "<H2>Senha: <input type=password name=f_senha></H2>";
    echo "<br/>";
    echo "<input type=submit value=Enviar>";
    echo "</form>";
    echo "</div>";
    echo "</b>";
    echo "</body>";
    echo "</html>";
}

?>
