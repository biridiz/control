<?php
class Evento {
	
	private $id = null;
	private $nome = null;
	private $preco = null;
	private $cidade = null;

	public function __construct($paramID) {
		
		include_once "../_include/conexao.php";
		
		$sql = "select ID, NOME, PRECO, CIDADE from evento where ID = '$paramID'";
		$resultado = mysqli_query($conexao, $sql);
		$row = mysqli_fetch_array($resultado);
		
		/***********************************************************************************
		 * Alguns campos não são obrigatórios no banco, rever como tratar isso futuramente *
		 ***********************************************************************************/

		$this -> id = $row[0];
		$this -> nome = $row[1];
		$this -> preco = $row[2];
		$this -> cidade = $row[3]; 
	}


	public function getId() {
		return $this -> id;
	}

	public function getNome() {
		return $this -> nome;
	}	

	public function getPreco() {
		return $this -> preco;
	}

	public function getCidade() {
		return $this -> cidade;
	}


	public function adicionarEvento($paramNome, $paramPreco, $paramCidade){

		include_once "../_include/conexao.php";

		$sql = "insert into evento(NOME, PRECO, CIDADE) values ('$paramNome', '$paramPreco', '$paramCidade')";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function modificarNome($paramNome, $paramID) {

		include_once "../_include/conexao.php";

		$sql = "update evento set NOME = '$paramNome' where ID = '$paramID'";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function modificarPreco($paramPreco, $paramID) {

		include_once "../_include/conexao.php";

		$sql = "update evento set PRECO = '$paramPreco' where ID = '$paramID'";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function modificarCidade($paramCidade, $paramID) {

		include_once "../_include/conexao.php";

		$sql = "update evento set CIDADE = '$paramCidade' where ID = '$paramID'";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function deletar($paramID) {

		include_once "../_include/conexao.php";

		$sql = "delete from evento where ID = '$paramID'";
		if(mysqli_query($conexao, $sql)) {
			return true;
		} else { return false; }
	}

	public function listar() {

		include_once "../_include/conexao.php";

		$sql = "select ID, NOME, PRECO, CIDADE from evento";
		$resultado = mysqli_query($conexao, $sql);
		$row = mysqli_fetch_array($resultado);
		if(mysqli_query($conexao, $sql)) {
			return $row;
		} else { return false; }
	}

}
