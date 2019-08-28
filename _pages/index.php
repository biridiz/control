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

      <title id="title">Página inicial</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="../_estilo/estilo.css"><!--importando o arquivo css-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>

  <!-- ******************************************************************* -->
                  <!-- FRONT-END, BOTÔES DO MENU -->
  <!-- ******************************************************************* -->

  <body id="body-index">
		<div id="box-opt">
			<form action="" method="post">
        <button type="submit" name="in" class="btn btn-primary btn-lg btn-block">Registrar Entrada para envento simples</button>
        <button type="submit" name="in" class="btn btn-primary btn-lg btn-block"disabled>Registrar Entrada para envento complexo</button>
        <button type="submit" name="out" class="btn btn-primary btn-lg btn-block">Registrar Saída</button>
			</form>
		</div>

  <!-- ******************************************************************* -->
          <!-- BACK-END, REDIRECIONAMENTO DE ACORDO COM BOTÔES -->
  <!-- ******************************************************************* -->

    <?php include_once "../_include/conexao.php";
      if(isset($_POST['in'])){
        header("Location: ../_pages/in.php");
      }
      if(isset($_POST['out'])){
        header("Location: ../_pages/out.php");
      }
      $sql = "select ID, placa, modelo, cor, horaIn, horaOut, data from registros";
      $resultado = mysqli_query($conexao, $sql);
    ?>

    <!-- ******************************************************************* -->
                  <!-- FRONT-END, CAIXA DE PESQUISA -->
    <!-- ******************************************************************* -->

    <div>
      <form action="" method="post" id="form-pesq">
        <div id="btn-pesq">
          <button type="submit" class="btn btn-outline-dark"><i class="material-icons">&#xe8b6;</i></button>
        </div>
        <div id="box-pesq" class="form-group">
          <input name="search" type="text" class="form-control" id="validationCustom01" placeholder="Pesquisar">
        </div>
      </form>
    </div>
    <div>
    
    <!-- ******************************************************************* -->
                       <!-- TABELA DE REGISTROS -->
    <!-- ******************************************************************* -->

      <table id="table-reg" class="table" >
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Placa</th>
            <th scope="col">Modelo</th>
            <th scope="col">Cor</th>
            <th scope="col">Horário de entrada</th>
            <th scope="col">Horário de saída</th>
            <th scope="col">Data</th>
            <th scope="col">Tempo</th>
          </tr>
        </thead>
        <tbody>
        <? while($row = mysqli_fetch_array($resultado)){ ?>
            <tr>
              <th scope="row"><? echo "$row[0]";?></td>
              <td><? echo "$row[1]";?></td>
              <td><? echo "$row[2]";?></td>
              <td><? echo "$row[3]";?></td>
              <td><? echo "$row[4]";?></td>
              <td><? echo "$row[5]";?></td>
              <td><? echo "$row[6]";?></td>
              <td>**</td>
            </tr>
         <? } ?>
         </tbody>
      </table>
    </div>
	</body>
</html>