<?php

class Pessoa{

	private $pdo;

	//conexão com o banco de dados
	public function __construct($dbname, $host, $user, $senha){
		try{
		$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $user, $senha);
		} catch(PDOException $e){

			echo "Erro com o Banco e dados<br>" .$e->getMessage();
			exit();

		} catch (Exception $e){
			echo "Erro comum<br>" .$e->getMessage();
		}
	}

	public function buscarDados(){
		$res = array();
		$cmd = $this->pdo->query("SELECT * FROM pessoa ORDER BY nome");
		$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

	public function cadastrarPessoa($nome,$telefone,$email){
		//verifica se já está cadastrado
		$cmd = $this->pdo->prepare("SELECT id FROM pessoa WHERE email = :e");
		$cmd->bindValue(":e", $email);
		$cmd->execute();

		if($cmd->rowCount() > 0){ //email já cadastrado!
				return false;
		}else{
			$cmd = $this->pdo->prepare("INSERT INTO pessoa(nome,telefone,email) VALUES (:n, :t, :e)");
			$cmd->bindValue(":n", $nome);
			$cmd->bindValue(":t", $telefone);
			$cmd->bindValue(":e", $email);
			$cmd->execute();

		}
	}

}

?>