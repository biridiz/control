<?php
class Registro {

	public function __construct(){
		
	}

	public function filtrarId($paramID){

		include "../_include/conexao.php";
		$sql = "select ID, PLACA, MODELO, COR, DATA, CORTESIA, HORAIN, HORAOUT from registros where ID = '$paramID' group by ID";
		$resultado = mysqli_query($conexao, $sql);
		$query = array();
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;
	}

	public function filtrarPlaca($paramPlaca){

		include "../_include/conexao.php";
		$sql = "select ID, PLACA, MODELO, COR, DATA, CORTESIA, HORAIN, HORAOUT from registros where PLACA = '$paramPlaca' group by PLACA";
		$resultado = mysqli_query($conexao, $sql);
		$query = array();
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;
	}

	public function filtrarModelo($paramModelo){

		include "../_include/conexao.php";
		$sql = "select ID, PLACA, MODELO, COR, DATA, CORTESIA, HORAIN, HORAOUT from registros where MODELO = '$paramModelo' group by MODELO";
		$resultado = mysqli_query($conexao, $sql);
		$query = array();
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;
	}

	public function filtrarCor($paramCor){

		include "../_include/conexao.php";
		$sql = "select ID, PLACA, MODELO, COR, DATA, CORTESIA, HORAIN, HORAOUT from registros where COR = '$paramCor' group by COR";
		$resultado = mysqli_query($conexao, $sql);
		$query = array();
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;
	}

	public function listar() {

		include "../_include/conexao.php";
		$sql = "select ID, PLACA, MODELO, COR, DATA, CORTESIA, HORAIN, HORAOUT from registros group by ID";
		$resultado = mysqli_query($conexao, $sql);
		$query = array();
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;	
	}
}
