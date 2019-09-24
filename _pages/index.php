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
      <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
	</head>

  <!-- ******************************************************************* -->
          <!-- BACK-END, ENVIO DE FORMULÁRIO -->
  <!-- ******************************************************************* -->

      <?php include_once "../_include/conexao.php" ?>
          <?php
            date_default_timezone_set('America/Sao_Paulo');
            $erro = 0;
            $placa = '';
            if(isset($_POST['in'])){
              $placa = strtoupper($_POST['placa']);
              $data = date("Y/m/d");
              $horaIn = date("H:i");
              if(isset($_POST['cortesia']))  $cortesia = "S";
              else $cortesia = "N";
              if(empty($placa)){
                $erro ++;?>
                <script>
                  alert("Campo placa não preenchido");
                  alert("Ocorreu um erro no registro!")
                </script><?
              }
              if($erro == 0){
                $sql = "insert into registros (PLACA, DATA, HORAIN, CORTESIA, ID_EVENTO) values 
                        ('$placa', '$data', '$horaIn', '$cortesia', 1)";
                if(mysqli_query($conexao, $sql)){?>
                  <script>
                      alert("Registro efetuado com sucesso!");
                  </script><?
                  $sql = "select ID from registros where PLACA = '$placa'";
                  $resultado = mysqli_query($conexao, $sql);
                  $id_print = mysqli_fetch_array($resultado);
                  if($cortesia == 'N') {
                    require_once('../escpos-php/example/interface/test02.php');
                  }
                  else require_once('../escpos-php/example/interface/test01.php');
                }else echo mysqli_error($conexao);
              }
            }
            if(isset($_POST['out'])){
              if(empty($_POST['placa'])){?>
                <script>
                  alert("Campo placa não preenchido");
                  alert("Ocorreu um erro no registro!")
                </script><?
              }
              else{
                $placa = $_POST['placa'];
                date_default_timezone_set('America/Sao_Paulo');
                $hora = date("H:i");
                $sql = "update registros set HORAOUT = '$hora' where PLACA = '$placa'";
                echo mysqli_error($conexao);
                if(mysqli_query($conexao, $sql)){?>
                  <script>
                    alert("Registro efetuado com sucesso!");
                  </script><?
                }
                else echo "erro"; 
              }
            }
          ?>

    <!-- ******************************************************************* -->
               <!-- FRONT-END, FORMULÁRIO DE REGISTRO DE ENTRADA -->
    <!-- ******************************************************************* -->
  <body id="body-index">
    <div>
      <form action="" method="post">
        <div id="btn-op" >
           <button type="submit" name="control" >Config</button>
           <?
           if(isset($_POST['control'])){
            header("Location: ../_pages/control.php");
           }
           ?>
        </div>
        <div>
          <div>
            <input type="text" id="placa" name="placa" placeholder="PLACA">
          </div>
          <div id="credencial">
            <input type="checkbox" name="cortesia" checked>
            <!--<input type="checkbox" name="cortesia">-->
            <label>CREDENCIAL</label>
          </div>
        </div>
    		<div id="box-opt">
            <button class="btn-index" type="submit" name="in" >Entrada / Imprimir</button>
            <button class="btn-index" type="submit" name="out" >Registrar Saída</button>
    		</div>

        <div id="form-pesq">
          <div>
            <input class="form-form" name="pesq" id='pesq' type="text" placeholder="Pesquisar"><br>
            <button id="first_btn" type="submit" name="search">Normal</button>
            <button id="second_btn" type="submit" name="search_exclusive">Credencial</button><br>
          </div>
      </form>
    </div>
  
    <!-- ******************************************************************* -->
                       <!-- TABELA DE REGISTROS -->
    <!-- ******************************************************************* -->
    
    <div id="table-reg">
        <?php
        $resultado = '';
        if(isset($_POST['search'])) {
          ?>
          <table>
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Placa</th>
                <th scope="col">Horário de entrada</th>
                <th scope="col">Data</th>
              </tr>
            </thead>
            <tbody>
        <?php
          $id = $_POST['pesq'];
          $sql = "select ID, PLACA, HORAIN, DATA from registros where ID = '$id' or PLACA = '$id'";
          $resultado = mysqli_query($conexao, $sql);
          while($row = mysqli_fetch_array($resultado)){ ?>
            <tr>
              <th scope="row"><?php echo "$row[0]";?></td>
              <td><?php echo "$row[1]";?></td>
              <td><?php echo "$row[2]";?></td>
              <td><?php echo "$row[3]";?></td>
            </tr>
        <?php
          }
        }?> 
        <?php
        $resultado = '';
        if(isset($_POST['search_exclusive'])) {
          ?>
          <table>
            <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Id Exlusivo</th>
              </tr>
            </thead>
            <tbody>
        <?php
          $id = $_POST['pesq'];
          $sql = "select CODIGO, ID_EXTERNO from credencial where ID_EXTERNO = '$id'";
          $resultado = mysqli_query($conexao, $sql);
          while($row = mysqli_fetch_array($resultado)){ ?>
            <tr>
              <th scope="row"><?php echo "$row[0]";?></td>
              <td>00<?php echo "$row[1]";?></td>
            </tr>
        <?php
          }
        }?>         
         </tbody>
      </table>
    </div> 
	</body>
</html>