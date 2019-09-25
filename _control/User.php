<?php
class User {

	private $id = null;
	private $nome = null;
	private $telefone = null;

	public function __contruct($paramID){

		include_once "../_include/conexao.php";
		
		$sql = "select ID, NOME, TELEFONE from usr where ID = '$paramID'";
		$resultado = mysqli_query($conexao, $sql);
		$row = mysqli_fetch_array($resultado);
		
		/***********************************************************************************
		 * Alguns campos não são obrigatórios no banco, rever como tratar isso futuramente *
		 ***********************************************************************************/

		$this -> id = $row[0];
		$this -> nome = $row[1];
		$this -> telefone = $row[2];
	}


	public function getId() {
		return $this -> id; 
	}

	public function getNome() {
		return $this -> nome;
	}

	public function getTelefone(){
		return $this -> telefone;
	}

	
	public function adicionarUser($paramNome, $paramTelefone) {
		
		include_once "../_include/conexao.php";

		$sql = "insert into usr(NOME, TELEFONE) values ('$paramNome', '$paramTelefone')";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function modificarNome($paramNome, $paramID) {

		include_once "../_include/conexao.php";

		$sql = "update usr set NOME = '$paramNome' where ID = '$paramID'";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function modificarTelefone($paramTelefone, $paramID) {

		include_once "../_include/conexao.php";

		$sql = "update usr set TELEFONE = '$paramTelefone' where ID = '$paramID'";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function deletar($paramID) {

		include_once "../_include/conexao.php";

		$sql = "delete from usr where ID = '$paramID'";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}
	
	public function listar() {

		include_once "../_include/conexao.php";

		$sql = "select ID, NOME, TELEFONE from usr";
		$resultado = mysqli_query($conexao, $sql);
		$query = array();
		while($row = mysqli_fetch_assoc($resultado)){
    		$query[] = $row;
		}

		return $query;	
	}
}
