<?php   
    require_once 'DAO/usuariosDAO.php';    
?>
<?php
			$myuser = new usuarios();
			if(!empty($_POST['f_mail']) and !empty($_POST['f_senha'])){                
                $myuser->setEmail($_POST['f_mail']);
                $myuser->setSenha($_POST['f_senha']);
                              
                $myuserDAO = new usuariosDAO($myuser);                
                $retorno = $myuserDAO->autenticacao();
                //print_r($retorno);                   
                //print_r(count($retorno));
                if(count($retorno) > 0){
                    if($_POST['f_senha'] == "123456"){                       
                        Header("Location: D:\FATEC\PHP\arquivos\trocaSenhaTemp.php");
                    }else{                        
                        Header("Location: D:\FATEC\PHP\arquivos\cadastro.php");
                    }
                }else{
                    echo "<script language=javascript>alert( 'Usuário/Senha Incorreto!' );</script>";
                }
			}
		?>        
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div class="formLogin">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h3>Login</h3>
                    <input type="text" placeholder="E-mail" name="f_mail"><br/>               
                    <input type="password" placeholder="Senha" name="f_senha"><br/>            
                    <button type="submit">Entrar</button>                    
                    <br/>                    
                    <a href="D:\FATEC\PHP\arquivos\resetSenha.php">Esqueceu a senha?</a>
                    <br/><br/><br/>
                    <span>Não tem cadastro?</span>
                    <a href="D:\FATEC\PHP\arquivosnovoUsuario.php">Clique aqui.</a>
            </form>
        </div>
        
    </body>    	
</html>