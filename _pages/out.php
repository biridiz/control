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

      <title id="title">Registro de saídas</title>
      <link rel="stylesheet" href="../_estilo/estilo.css"><!--importando o arquivo css-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <!-- ******************************************************************* -->
              <!-- FRONT-END, FORMULÁRIO DE PESQUISA POR ID -->
  <!-- ******************************************************************* -->

    <body id="body-pg-out">
      <div id="box-out">
        <form action="" method="post">
          <div class="form-group">
            <label for="id">Informe o Id:</label><br>
            <input id="id" name="id" type="text" class="form-control" id="validationCustom01" placeholder="Pesquisar">
          </div>
          <button name="Pesquisar" value="Pesquisar" type="submit" class="btn btn-primary">Pesquisar</button>

  <!-- ******************************************************************* -->
                      <!-- TABELA DE CONFERÊNCIA -->
  <!-- ****** ************************************************************* -->

          <?php include_once "../_include/conexao.php";?>  
          <?php
          if(isset($_POST['Pesquisar'])){
              $id = $_POST['id'];
              $sql = "select ID, PLACA, DATA from registros where ID = '$id'";
              $resultado = mysqli_query($conexao, $sql);?>
              <table id="table-reg" class="table">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Placa</th>
                  <th scope="col">Data</th>
                </tr>
              <?php
              while($row = mysqli_fetch_array($resultado)){ ?>
                  <tr>
                    <td scope="row"><?php echo "$row[0]";?></td>
                    <td><?php echo "$row[1]";?></td>
                    <td><?php echo "$row[2]";?></td>
                  </tr>
                <?}?>
              </table>
          <?php
          }?>
 
  <!-- ******************************************************************* -->
            <!-- FRONT-END, FORMULÁRIO DE CONFIRMAÇÃO POR PLACA -->
  <!-- ******************************************************************* -->
          
          <div class="form-group">
            <label for="Placa">Informe a placa para confirmar a saída:</label><br>
            <input id="placa" name="placa" type="text" class="form-control" id="validationCustom01" placeholder="Placa">
          </div>
          <button name="Confirmar" value="Confirmar" type="submit" class="btn btn-primary">Confirmar</button>

  <!-- ******************************************************************* -->
    <!-- BACK-END, ENVIO DO FORMULÁRIO E ATUAIZAÇÃO DE REGISTRO NO BANCO -->
  <!-- ******************************************************************* -->

            <?php
            if(isset($_POST['Confirmar'])){
                $placa = $_POST['placa'];
                date_default_timezone_set('America/Sao_Paulo');
                $hora = date("H:i");
                $sql = "update registros set HORAOUT = '$hora' where PLACA = '$placa'";
                echo mysqli_error($conexao);
                if(mysqli_query($conexao, $sql)){
                  echo "<h4 id=\"msg-ok-out\">Registro de saída efetuado com sucesso!</h4>";
                }
                else echo "erro"; 
              }?>
        </form>
      </div>
      <a id="link-out" href="../_pages/index.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Voltar</a>;
    </body>
</html>