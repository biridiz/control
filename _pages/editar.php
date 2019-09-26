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

      <title id="title">Editar Registros</title>
      <style type="text/css">
		.btn-edit{
			float: right;
		    font-size: 6px;
		}
	  </style>
      <link rel="stylesheet" href="../_estilo/estilo.css"><!--importando o arquivo css-->
      <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
	</head>
	<body>
	
	<?php
	include_once '../_control/Registro.php';
	$reg = new Registro();
	?>

		<div>
			<section>
				<form action="" method="post">
					<input type="text" name="id" placeholder="ID">
					<?php
					$i = 0;
					if(isset($_POST['id'])){
						
						$id = $_POST['id'];
						$row = $reg->filtrarId($id);
	
						$_placa = $row[$i]['PLACA'];
						$_cor = $row[$i]['COR'];
						$_modelo = $row[$i]['MODELO'];
						$_data = $row[$i]['DATA'];
						$_horaIn = $row[$i]['HORAIN'];
						$_horaOut = $row[$i]['HORAOUT'];
						?>
						<br><?echo $_placa?><br>
						<input type="text" placeholder="" name="placa" ><br><?echo $_cor ?><br>
						<input type="text" placeholder=""><br><?echo $_modelo ?><br>
						<input type="text" placeholder=""><br><?echo $_data ?><br>
						<input type="text" placeholder=""><br><?echo $_horaIn ?><br>
						<input type="text" placeholder=""><br><?echo $_horaOut ?><br>
						<input type="text" placeholder=""><br>
						<button type="submit" id="Confirma" name="Confirma">Confirma</button><?
						if(isset($_POST['Confirma'])){
							$placa = $_POST['placa'];
							$reg->modificaPlaca($placa);
						}
					}
					?>
				</form>
			</section>
		</div>
	</body>
</html>