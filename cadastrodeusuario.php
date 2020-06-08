<?php
	include "usuarios.php";
?>
<html>
	<head>
		<title>Cadastro de Usuários</title>
	</head>
	<body>
		<b>
		<h1>Cadastro de Usuários</h1>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<H2>Nome: <input type="text" name="f_nome"></H2>
			<br/>
			<H2>Email: <input type="text" name="f_mail"></H2>
			<br/>
			<H2>Senha: <input type="password" name="f_senha"></H2>
			<br/>
			<input type="submit" value="Enviar">
		</form>
		<?php
			if(isset($_POST['f_nome']) and isset($_POST['f_mail']) and isset($_POST['f_senha'])){
				$myuser = new usuarios();
				$myuser->setNome($_POST['f_nome']);
				$myuser->setEmail($_POST['f_mail']);
				$myuser->setSenha($_POST['f_senha']);
				
				if($myuser->insert()){
					echo('<script>window.alert("Cadastrado com sucesso!");window.location="index.php";</script>');
				}
                else{
					echo('<script>window.alert("Falha ao cadastrar usuario!");</script>');
				}				
			}
			else {
				echo "Todos os campos são obrigatórios!";
			}
		?>
		
		</b>
	</body>
</html>