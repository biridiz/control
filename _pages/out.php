<!DOCTYPE html>
<html lang="pt-br">
  <head>
      <meta charset="utf-8"><!--faz o site aceitar o padrao universao de caracteres com acentos e cedilha-->
      <!--SEO BASICO-->
      <meta name="author" content="Luiz Dendena">
      <meta name="description" content="control">
      <!--Design Responsivo-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title id="title">Registro de saídas</title>
      <link rel="stylesheet" href="../_estilo/estilo.css"><!--importando o arquivo css-->
    </head>
    <body>
      <div>
        <form action="" method="post">
          <ul>
            <li>
              <label for="id">Informe o Id para registrar a saída:</label><br>
              <input type="text" placeholder="Id..." id="id" name="id">
            </li>
            <li>
              <input type="submit" name="registrar" value="Confirmar">
            </li>
          </ul>
        </form>
      </div>
      <?php include_once "../_include/conexao.php" ?>
          <?
            if(isset($_POST['Confirmar'])){
              $id = $_POST['id'];
              $sql = "select ID from registros where ID = '$id";
              if(mysqli_query($conexao, $sql)){
                date_default_timezone_set('America/Sao_Paulo');
                $hora = date("H:i");
                $sql = " update registros set horaOut = '$hora' where ID = '$id'";
                if(mysqli_query($conexao, $sql)){
                  echo "Registro de saída efetuado com sucesso";
                }
              }
              else echo "Id informado não corresponde a nenhum registro";
              # Pensar mais afundo a respeito de erros que podem vir a surgir #
            }
          ?>
    </body>
</html>