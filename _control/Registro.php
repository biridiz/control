<?php
class Registro {

	public function __construct(){
		
	}

	public function modificaPlaca($paramPlaca){
		echo $paramPlaca;
	}

	public function filtrarId($paramID){

		include "../_include/conexao.php";
		$sql = "select ID, PLACA, MODELO, COR, date_format(DATA, '%d/%m/%Y') AS DATA, CORTESIA, HORAIN, HORAOUT from registros where ID = '$paramID'";
		$sqlCont = "select count(ID) as TOTAL from registros where ID = '$paramID'";
		
		$resultado = mysqli_query($conexao, $sqlCont);
		$cont = mysqli_fetch_array($resultado);
		echo "->Total de Registros: $cont[0]\n";

		$resultado = mysqli_query($conexao, $sql);
		$query = array();
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;
	}

	public function filtrarPlaca($paramPlaca){

		include "../_include/conexao.php";
		$sql = "select ID, PLACA, MODELO, COR, date_format(DATA, '%d/%m/%Y') AS DATA, CORTESIA, HORAIN, HORAOUT from registros where PLACA = '$paramPlaca'";
		$sqlCont = "select count(ID) as TOTAL from registros where PLACA = '$paramPlaca'";
		
		$resultado = mysqli_query($conexao, $sqlCont);
		$cont = mysqli_fetch_array($resultado);
		echo "->Total de Registros: $cont[0]\n";

		$resultado = mysqli_query($conexao, $sql);
		$query = array();
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;
	}

	public function filtrarModelo($paramModelo){

		include "../_include/conexao.php";
		$sql = "select ID, PLACA, MODELO, COR, date_format(DATA, '%d/%m/%Y') AS DATA, CORTESIA, HORAIN, HORAOUT from registros where MODELO = '$paramModelo'";
		$sqlCont = "select count(ID) as TOTAL from registros where MODELO = '$paramModelo'";
		
		$resultado = mysqli_query($conexao, $sqlCont);
		$cont = mysqli_fetch_array($resultado);
		echo "->Total de Registros: $cont[0]\n";

		$resultado = mysqli_query($conexao, $sql);
		$query = array();
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;
	}

	public function filtrarData($paramData){

		include "../_include/conexao.php";
		$sql = "select ID, PLACA, MODELO, COR, date_format(DATA, '%d/%m/%Y') AS DATA, CORTESIA, HORAIN, HORAOUT from registros where DATA = '$paramData'";
		$sqlCont = "select count(ID) as TOTAL from registros where DATA = '$paramData'";
		
		$resultado = mysqli_query($conexao, $sqlCont);
		$cont = mysqli_fetch_array($resultado);
		echo "->Total de Registros: $cont[0]\n";

		$resultado = mysqli_query($conexao, $sql);
		$query = array();
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;
	}

	public function filtrarCor($paramCor){

		include "../_include/conexao.php";
		$sql = "select ID, PLACA, MODELO, COR, date_format(DATA, '%d/%m/%Y') AS DATA, CORTESIA, HORAIN, HORAOUT from registros where COR = '$paramCor'";
		$sqlCont = "select count(ID) as TOTAL from registros where COR = '$paramCor'";
		
		$resultado = mysqli_query($conexao, $sqlCont);
		$cont = mysqli_fetch_array($resultado);
		echo "->Total de Registros: $cont[0]\n";

		$resultado = mysqli_query($conexao, $sql);
		$query = array();
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;
	}

	public function filtrarCred($paramCred){

		include "../_include/conexao.php";
		$sql = "select ID, PLACA, MODELO, COR, date_format(DATA, '%d/%m/%Y') AS DATA, CORTESIA, HORAIN, HORAOUT from registros where CORTESIA = '$paramCred'";
		$sqlCont = "select count(ID) as TOTAL from registros where CORTESIA = '$paramCred'";
		
		$resultado = mysqli_query($conexao, $sqlCont);
		$cont = mysqli_fetch_array($resultado);
		echo "->Total de Registros: $cont[0]\n";

		$resultado = mysqli_query($conexao, $sql);
		$query = array();
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;
	}

	public function listar() {

		$cont = 0;
		$query = array();

		include "../_include/conexao.php";
		$sql = "select ID, PLACA, MODELO, COR, date_format(DATA, '%d/%m/%Y') AS DATA, CORTESIA, HORAIN, HORAOUT from registros group by ID";
		$sqlCont = "select count(ID) as TOTAL from registros";
		
		$resultado = mysqli_query($conexao, $sqlCont);
		$cont = mysqli_fetch_array($resultado);
		echo "->Total de Registros: $cont[0]\n";

		$resultado = mysqli_query($conexao, $sql);
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;	
	}
}
