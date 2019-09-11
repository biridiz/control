<?php
class Cliente {

	private $id = null;
	private $nome = null;
	private $telefone = null;
	private $cpf = null;

	public function __construct($paramID){
		
		include_once "../_include/conexao.php";
		
		$sql = "select ID, NOME, TELEFONE, CPF from cliente where ID = '$paramID'";
		$resultado = mysqli_query($conexao, $sql);
		$row = mysqli_fetch_array($resultado);
		
		/***********************************************************************************
		 * Alguns campos não são obrigatórios no banco, rever como tratar isso futuramente *
		 ***********************************************************************************/

		$this -> id = $row[0];
		$this -> nome = $row[1];
		$this -> telefone = $row[2];
		$this -> cpf = $row[3];
	}

	public function getId() {
		return $this -> id;
	}	

	public function getNome() {
		return $this -> nome;
	}

	public function getTelefone() {
		return $this -> telefone;
	}

	public function getCpf() {
		return $this -> cpf;
	}


	public function adicionarUser($paramNome, $paramTelefone, $paramCpf) {
		
		include_once "../_include/conexao.php";

		$sql = "insert into usr(NOME, TELEFONE, CPF) values ('$paramNome', '$paramTelefone', '$paramCpf')";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function modificarNome($paramNome, $paramID) {

		include_once "../_include/conexao.php";

		$sql = "update Cliente set NOME = '$paramNome' where ID = '$paramID'";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function modificarTelefone($paramTelefone, $paramID) {

		include_once "../_include/conexao.php";

		$sql = "update Cliente set TELEFONE = '$paramTelefone' where ID = '$paramID'";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function modificarCpf($paramCpf, $paramID) {

		include_once "../_include/conexao.php";

		$sql = "update Cliente set CPF = '$paramCpf' where ID = '$paramID'";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function deletar($paramID) {

		include_once "../_include/conexao.php";

		$sql = "delete from Cliente where ID = '$paramID'";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function listar() {

		include_once "../_include/conexao.php";

		$sql = "select ID, NOME, TELEFONE, CPF from Cliente";
		$resultado = mysqli_query($conexao, $sql);
		$row = mysqli_fetch_array($resultado);
		if(mysqli_query($conexao, $sql)) {
			return $row;
		} else { return false; }
	}
}