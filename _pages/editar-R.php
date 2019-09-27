<?php
include_once '../_control/Registro.php';
$reg = new Registro();
?>

<h3 id="tt-edit">Edição de Registros</h2>
<div id="box-edit">
	<section>
		<form action="" method="post">
			<input class="form-edit" type="text" name="id" placeholder="ID">*Informar o ID É OBRIGATÓRIO<br>
				<p class="form-edit" >Campos de edição:</p><br>					
				<input class="form-edit" type="text" placeholder="PLACA" name="placa" ><br>
				<input class="form-edit" type="text" placeholder="COR" name="cor"><br>
				<input class="form-edit" type="text" placeholder="MODELO" name="modelo"><br>
				<input class="form-edit" type="date" placeholder="DATA" name="data"><br>
				<button class="form-edit" type="submit" id="Confirma" name="Confirma">Confirma</button>
			<?php
			$i = 0;
			if(isset($_POST['Confirma'])){		
				$id = $_POST['id'];
				if(isset($_POST['placa'])){
					$placa = strtoupper($_POST['placa']);
					if(!empty($placa)){
						if($reg->modificarPlaca($placa, $id)){?>
							<script>
								alert("A placa foi alterada!");
							</script><?
						}
					}	
				}
				if(isset($_POST['cor'])){
					$cor = strtoupper($_POST['cor']);
					if(!empty($cor)){
						if($reg->modificarCor($cor, $id)){?>
							<script>
								alert("A cor foi alterada!");
							</script><?
						}
					}
				}
				if(isset($_POST['modelo'])){
					$modelo = strtoupper($_POST['modelo']);
					if(!empty($modelo)){
						if($reg->modificarModelo($modelo, $id)){?>
							<script>
								alert("O modelo foi alterado!");
							</script><?
						}
					}
				}
				if(isset($_POST['data'])){
					$data = $_POST['data'];
					if(!empty($data)){
						if($reg->modificarData($data, $id)){?>
							<script>
								alert("A data foi alterada!");
							</script><?
						}
					}
				}
			}
			?>
		</form>
	</section>
</div>