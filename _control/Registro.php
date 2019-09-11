<?php
class Registro {

	private $id = null;
	private $placa = null;
	private $modelo = null;
	private $cor = null;
	private $data = null;
	private $cortesia = false;
	private $horaIn = null;
	private $horaOut = null;

	public function __construct($paramID){
		
		include_once "../_include/conexao.php";
		
		$sql = "select ID, PLACA, MODELO, COR, DATA, CORTESIA, HORAIN, HORAOUT from registro where ID = '$paramID'";
		$resultado = mysqli_query($conexao, $sql);
		$row = mysqli_fetch_array($resultado);
		
		/***********************************************************************************
		 * Alguns campos não são obrigatórios no banco, rever como tratar isso futuramente *
		 ***********************************************************************************/

		$this -> id = $row[0];
		$this -> placa = $row[1];
		$this -> modelo = $row[2];
		$this -> cor = $row[3];
		$this -> data = $row[4];
		$this -> cortesia = $row[5];
		$this -> horaIn = $row[6];
		$this -> horaOut = $row[7];
	}

	public function getID() {
		return $this -> id;
	}

	public function getPlaca() {
		return $this -> placa;
	}

	public function getModelo() {
		return $this -> modelo;
	}

	public function getCor() {
		return $this -> cor;
	}

	public function getData() {
		return $this -> data;
	}

	public function getCortesia() {
		return $this -> cortesia;
	}

	public function getHoraIn() {
		return $this -> horaIn;
	}

	public function getHoraOut() {
		return $this -> horaOut;
	}
}
