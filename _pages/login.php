<!DOCTYPE html>
<html lang="pt-br">
	<head>
      <meta charset="utf-8"><!--faz o site aceitar o padrao universao de caracteres com acentos e cedilha-->
      <!--SEO BASICO-->
      <meta name="author" content="Luiz Dendena">
      <meta name="description" content="control">
      <!--Design Responsivo-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title id="title">Control</title>
      <link rel="stylesheet" href="../_estilo/estilo.css"><!--importando o arquivo css-->
	<body>
		<div>
			<form action="" method="post">
				<ul>
					<li>
						<label for="user">Login:</label><br>
            			<input type="text" placeholder="Login..." id="user" name="user">
						</li>
					<li>
						<label for="senha">Senha:</label><br>
            			<input type="password" placeholder="******..." id="senha" name="senha">
					</li>
					<li>
            			<input type="submit" name="Confirmar" value="Confirmar">
          			</li>
				</ul>
			</form>
		</div>
		<?php include_once "../_include/conexao.php" ?>
			<?
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