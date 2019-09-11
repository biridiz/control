  <!-- ******************************************************************* -->
                 <!-- BACK-END, VALIDAÇÃO DE ACESSO -->
  <!-- ******************************************************************* -->

<?php
  session_start();
  if(!isset($_SESSION['usuario']) & !isset($_SESSION['inicio'])){
    echo "Esta página é restrita a usuarios autenticados. Por gentileza volte para a página
    de <a href=\"login.php\">login</a>";
    die(); // Interrompe a navegação
  };
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
      <meta charset="utf-8"><!--faz o site aceitar o padrao universao de caracteres com acentos e cedilha-->
      <!--SEO BASICO-->
      <meta name="author" content="Luiz Dendena">
      <meta name="description" content="control">
      <!--Design Responsivo-->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title id="title">Registro de entradas</title>
      <link rel="stylesheet" href="../_estilo/estilo.css"><!--importando o arquivo css-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body id="body-pg-in">

  <!-- ******************************************************************* -->
          <!-- BACK-END, ENVIO DE FORMULÁRIO -->
  <!-- ******************************************************************* -->

      <?php include_once "../_include/conexao.php" ?>
          <?php
            date_default_timezone_set('America/Sao_Paulo');
            $erro = 0;
            $one = '';
            if(isset($_POST['Confirmar'])){
              $placa = strtoupper($_POST['placa']);
              $modelo = strtoupper($_POST['modelo']);
              $cor = strtoupper($_POST['cor']);
              $data = date("Y/m/d");
              $horaIn = date("H:i");
              if(empty($placa)){
                $erro ++;
                $one = "Campo placa não preenchido";
              }
              if($erro == 0){
                $sql = "insert into registros (PLACA, MODELO, COR, DATA, HORAIN) values 
                        ('$placa', '$modelo', '$cor', '$data', '$horaIn')";
                if(mysqli_query($conexao, $sql)){
                  echo "<h4 id=\"msg-ok\">Registro efetuado com sucesso!</h4>";
                  include_once "../escpos-php/example/interface/ethernet.php";
                }else echo mysqli_error($conexao);
              }
              else{
                echo "Ocorreu um erro no registro";
                # Pensar mais afundo a respeito de erros que podem vir a surgir #
              }
            }
          ?>

    <!-- ******************************************************************* -->
               <!-- FRONT-END, FORMULÁRIO DE REGISTRO DE ENTRADA -->
    <!-- ******************************************************************* -->

    	<div id="box-form-in">
    		<form action="" method="post">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Placa:</span>
            </div>
            <input type="text" id="placa" name="placa" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> <? echo "$one"; ?>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Modelo/Nome:</span>
            </div>
            <input type="text"  id="modelo" name="modelo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">*Opcional
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Cor:</span>
            </div>
            <input type="text"  id="cor" name="cor" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">*Opcional
          </div>
          <button name="Confirmar" value="Confirmar" type="submit" class="btn btn-primary">Imprimir</button>
    		</form>
    	</div>
      <a id="link-in" href="../_pages/index.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Voltar</a>
    </body>
</html>