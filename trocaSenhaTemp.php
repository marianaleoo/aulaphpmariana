<?php
    include "D:\FATEC\PHP\arquivos\usuarios.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recuperar</title>
</head>
<body>
    <div class="formResetSenha">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h3>Nova Senha</h3>
            <input type="password" name="f_senha" id="txtSenha" placeholder="cadastrar nova senha"/>
            <br/>
            <button>Salvar</button>
            <br/>
            <span>Criar uma nova conta:</span>
            <a href="D:\FATEC\PHP\arquivos\novoUsuario.php" id="criarConta">Cadastrar*</a>
            <br/><br/>
            <!--<a href="../index.php">Retornar ao Login</a> -->
        </form>
    </div>
    <?php
        $myuser = new usuarios();
        if(isset($_POST['f_senha'])){
            $myuser->setSenha($_POST['f_senha']);            
		    $myuser->setId($_SESSION["dados"][0]->id);
		    $myuser->setNome($_SESSION["dados"][0]->nome);
		    $myuser->setEmail($_SESSION["dados"][0]->email);
            $myuser->update($myuser->getId());
            Header("Location: D:\FATEC\PHP\arquivosindex.php");                      
        }
	?>        
</body>
</html>