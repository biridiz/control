<!DOCTYPE html>
<html lang="pt-br">
	<head>
      <meta charset="utf-8"><!--faz o site aceitar o padrao universao de caracteres com acentos e cedilha-->
      <!--SEO BASICO-->
      <meta name="author" content="Luiz Dendena">
      <meta name="description" content="control">
      <!--Design Responsivo-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title id="title">Página inicial</title>
      <link rel="stylesheet" href="../_estilo/estilo.css"><!--importando o arquivo css-->
	<body>
		<div>
			<form action="" method="post">
				<ul>
					<li>
            <input type="submit" name="in" value="Registrar Entrada">
          </li>
          <li>
            <input type="submit" name="out" value="Registrar Saída">
          </li>
				</ul>
			</form>
		</div>
    <?php include_once "../_include/conexao.php" ?>
        <?
          if(isset($_POST['Registrar Entrada'])){
            header("Location: ../_pages/in.php");
          }
          if(isset($_POST['Registrar Saída'])){
            header("Location: ../_pages/out.php");
          }
        ?>
	</body>
</html>