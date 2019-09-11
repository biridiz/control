<!DOCTYPE html>
<html lang="pt-br">
	<head>
      <meta charset="utf-8"><!--faz o site aceitar o padrao universao de caracteres com acentos e cedilha-->
      <!--SEO BASICO-->
      <meta name="author" content="Luiz Dendena">
      <meta name="description" content="control">
      <!--Design Responsivo-->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title id="title">Control</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="../_estilo/estilo.css"><!--importando o arquivo css-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>

	<!-- ******************************************************************* -->
					<!-- FRONT-END, FORMULÁRIO DE LOGIN -->
	<!-- ******************************************************************* -->

	<body id="body-login">
		<i class="material-icons" id="icone-login">&#xe531;</i>
		<form action="" method="post" id="container-box-login">
			<div class="form-group">
			    <label class="font-color" for="exampleInputEmail1">Login</label>
			    <input name="user" type="text" class="form-control" id="validationCustom01" aria-describedby="emailHelp" placeholder="User">
			</div>
			<div class="form-group">
			    <label class="font-color" for="exampleInputPassword1">Senha</label>
			    <input name="senha" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			</div>
			  <button name="Confirmar" value="Confirmar" type="submit" class="btn btn-primary">Confirmar</button>
		</form>

	<!-- ******************************************************************* -->
					<!-- BACK-END, CONFIRMAÇÃO DE LOGIN -->
	<!-- ******************************************************************* -->

		<?php include_once "../_include/conexao.php" ?>
			<?php
				if(isset($_POST['Confirmar'])){
					$login = $_POST['user'];
					$senha = $_POST['senha'];
					include "../_include/verificaLogin.php";
					$check = new verificaLogin();
					$check->checkAcess($login, $senha);
				} 
			?>
	</body>
</html>