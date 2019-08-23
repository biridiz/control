<?php
class VerificaLogin{
	
	private $login;
	private $senha;

	public function __construct(){
		$this->login = "admin";
		$this->senha = "1234";
	}

	public function checkAcess($l, $s){
		if($l <> $this->login) return "Login incorreto, digite novamente";
		elseif($s <> $this->senha) return "Senha incorreta, digite novamente";
		else{
			session_start();
			$_SESSION['usuario'] = $_POST['login'];
			$_SESSION['inicio'] = date("d/m/Y H:i");
			header("Location: ../_pages/index.php");
		}
	} 
}
?>