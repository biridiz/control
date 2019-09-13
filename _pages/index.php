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
      <link rel="stylesheet" href="../_estilo/estilo.css"><!--importando o arquivo css-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>

  <!-- ******************************************************************* -->
                  <!-- FRONT-END, BOTÔES DO MENU -->
  <!-- ******************************************************************* -->

  <body id="body-index">
		<div id="box-opt">
			<form action="" method="post">
        <button type="submit" name="in" class="btn btn-primary btn-lg btn-block">Registrar Entrada</button>
        <button type="submit" name="out" class="btn btn-primary btn-lg btn-block">Registrar Saída</button>
        <button type="submit" name="config" class="btn btn-primary btn-lg btn-block"disabled>Controle</button>
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
      ?>

    <!-- ******************************************************************* -->
                  <!-- FRONT-END, CAIXA DE PESQUISA -->
    <!-- ******************************************************************* -->

    <div>
      <form action="" method="post" id="form-pesq">
        <div class="form-group">
          <input name="pesq" id='pesq' type="text" class="form-control" id="validationCustom01" placeholder="Pesquisar">
          <button type="submit" name="search" class="btn btn-outline-dark"><!--<i class="material-icons">&#xe8b6;</i>--></button>
          <button type="submit" name="search_exclusive" class="btn btn-outline-dark"><!--<i class="material-icons">&#xe8b6;</i>--></button>
        </div>
      </form>
    </div>
    
    <!-- ******************************************************************* -->
                       <!-- TABELA DE REGISTROS -->
    <!-- ******************************************************************* -->
    
    <div class="table-reg">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Placa</th>
            <th scope="col">Horário de entrada</th>
            <th scope="col">Horário de saída</th>
            <th scope="col">Data</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $resultado = '';
        if(isset($_POST['search'])) {
          $id = $_POST['pesq'];
          $sql = "select ID, PLACA, HORAIN, HORAOUT, DATA from registros where ID = '$id'";
          $resultado = mysqli_query($conexao, $sql);
          while($row = mysqli_fetch_array($resultado)){ ?>
            <tr>
              <th scope="row"><?php echo "$row[0]";?></td>
              <td><?php echo "$row[1]";?></td>
              <td><?php echo "$row[2]";?></td>
              <td><?php echo "$row[3]";?></td>
              <td><?php echo "$row[4]";?></td>
            </tr>
        <?php
          }
        }?> 
        <?php
        $resultado = '';
        if(isset($_POST['search_exclusive'])) {
          $id = $_POST['pesq'];
          $sql = "select CODIGO from credencial where ID_EXTERNO = '$id'";
          $resultado = mysqli_query($conexao, $sql);
          while($row = mysqli_fetch_array($resultado)){ ?>
            <tr>
              <th scope="row"><?php echo "$row[0]";?></td>
              <td><?php echo "$row[1]";?></td>
              <td><?php echo "$row[2]";?></td>
              <td><?php echo "$row[3]";?></td>
              <td><?php echo "$row[4]";?></td>
            </tr>
        <?php
          }
        }?>         
         </tbody>
      </table>
    </div> 
	</body>
</html>