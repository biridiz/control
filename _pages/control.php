<!DOCTYPE html>
<html lang="pt-br">
	<head>
      <meta charset="utf-8"><!--faz o site aceitar o padrao universao de caracteres com acentos e cedilha-->
      <!--SEO BASICO-->
      <meta name="author" content="Luiz Dendena">
      <meta name="description" content="control">
      <!--Design Responsivo-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title id="title">Controle</title>
      <link rel="stylesheet" href="../_estilo/estilo.css"><!--importando o arquivo css-->
    </head>
    <body>
      <?php include_once "../_include/conexao.php"; ?>
      <?
        $sql = "select ID, placa, modelo, cor, horaIn, horaOut, data from registros";
        $resultado = mysqli_query($conexao, $sql);
      ?>

      <div>
        <form action="" method="post">
          <label for="search">Filtrar por:</label><br>
          <input type="checkbox" id="id" name="id" value ="1"> ID <br>
          <input type="checkbox" id="placa" name="placa" value ="2"> Placa <br>
          <input type="checkbox" id="model" name="model" value ="3"> Modelo <br>
          <input type="checkbox" id="cor" name="cor" value ="4"> Cor <br>
          <input type="checkbox" id="date" name="date" value ="5"> Data <br>
          
          <label for="cor">Search:</label><br>
          <input type="text" placeholder="Search..." id="cor" name="cor"> <hr>
        </form>
        <table border = "1">
          <tr>
            <th>Id</th>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Cor</th>
            <th>Horário de entrada</th>
            <th>Horário de saída</th>
            <th>Data</th>
            <th>Tempo</th>
          </tr>
          <tr>
          <? while($row = mysqli_fetch_array($resultado)){ ?>
              <td><? echo "%row['ID']";?></td>
              <td><? echo "%row['placa']";?></td>
              <td><? echo "%row['modelo']";?></td>
              <td><? echo "%row['cor']";?></td>
              <td><? echo "%row['horaIn']";?></td>
              <td><? echo "%row['horaOut']";?></td>
              <td><? echo "%row['data']";?></td>
              <td>**</td>
          <? } ?>
          </tr>
        </table>
      </div>
    </body>
</html>