<?php
    include "usuarios.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alterar Dados</title>
</head>
<body>
    <div class="formResetSenha">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h3>Atualizar dados</h3>
            <input type="text" name="f_nome" id="txtSenha" placeholder="nome"/>
            <br/>
            <input type="text" name="f_email" id="txtSenha" placeholder="e-mail"/>
            <br/>
            <button>Salvar</button>
            <br/>
            <span>Retornar:</span>
            <a href="cadastro.php" id="criarConta">aqui*</a>
            <br/><br/>
        </form>
    </div>
    <?php
        $myuser = new usuarios();
        if(isset($_POST['f_nome']) and isset($_POST['f_email'])){           
		    $myuser->setNome($_POST['f_nome']);
		    $myuser->setEmail($_POST['f_email']);
            $myuser->alteraDados($myuser->getId());
            Header("cadastro.php");
        }
	?>        
</body>
</html>