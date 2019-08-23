<!DOCTYPE html>
<html lang="pt-br">
	<head>
      <meta charset="utf-8"><!--faz o site aceitar o padrao universao de caracteres com acentos e cedilha-->
      <!--SEO BASICO-->
      <meta name="author" content="Luiz Dendena">
      <meta name="description" content="control">
      <!--Design Responsivo-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title id="title">Registro de entradas</title>
      <link rel="stylesheet" href="../_estilo/estilo.css"><!--importando o arquivo css-->
    </head>
    <body>
      <?php include_once "../_include/conexao.php" ?>

          <?
            date_default_timezone_set('America/Sao_Paulo');
            if(isset($_POST['Confirmar'])){
              $placa = $_POST['placa'];
              $modelo = $_POST['modelo'];
              $cor = $_POST['cor'];
              $data = date("d/m/Y");
              $hora = date("H:i");
            }
            if(empty($placa)){
              $erro ++;
              $one = "Campo placa não preenchido";
            }
            if(empty($modelo)){
              $erro ++;
              $two = "Campo modelo não preenchido";
            }
            if(empty($cor)){
              $erro ++;
              $tree = "Campo cor não preenchido";
            }
            if($erro == 0){
              $sql = "insert into registros (placa, modelo, cor, data, hora) values 
                      ('$placa', '$modelo', '$cor', '$data', '$horaIn')";
              if(mysqli_query($conexao, $sql)){
                echo "Registro efetuado com sucesso!";
                header("Location: ../_pages/index.php");
                # Aqui entra a impressão #
                # Fazer classe com funcão específica pra isso #
              }
            }
            else{
              echo "Ocorreu um erro no registro";
              echo "<p><a href=\"../_pages/index.php\">Voltar</a></p>";
              # Pensar mais afundo a respeito de erros que podem vir a surgir #
            }
          ?>
    	<div>
    		<form action="" method="post">
    			<ul>
      			<li>
  						<label for="placa">Placa:</label><br>
              <input type="text" placeholder="Placa..." id="placa" name="placa">
              <? echo "$one" ?>
  					</li>
  					<li>
  						<label for="modelo">Modelo/Nome:</label><br>
              <input type="text" placeholder="Modelo..." id="modelo" name="modelo">
              <? echo "$two" ?>
  					</li>
  					<li>
  						<label for="cor">Cor:</label><br>
              <input type="text" placeholder="Cor..." id="cor" name="cor">
              <? echo "$tree" ?>
  					</li>
  					<li>
              <input type="submit" name="registrar" value="Confirmar">
            </li>
    			</ul>
    		</form>
    	</div>
    </body>
</html>