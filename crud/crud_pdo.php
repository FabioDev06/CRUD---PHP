<?php

//-------------CONEXÃO COM O BANCO DE DADOS------------

try { //try -> onde pode gerar algum erro

//precisamos criar uma variável (pode ser qualquer nome)
//precisamos também passar os parâmetros:
$pdo = new PDO("mysql:dbname=crudpdo;host=localhost","root",""); //conexão feita
//-Tipo de banco de dados( MySQL), dbname= nome do banco, host, usuario e senha
	
} catch (PDOException $e) { //erros relacionados ao banco de dados
	echo "Erro com o banco de dados!<br>". $e->getMessage();

} catch (Exception $e){
	echo "Erro genérico!". $e->getMessage();
}

		//conexão com o banco feita

//--------------------INSERT-------------------------

//1º forma
/*$res = $pdo->prepare("INSERT INTO pessoa(nome,telefone,email) VALUES(:n, :t, :e)");//precisamos passar algum parâmetro e substituir

$res->bindValue(":n", "Goten"); //aceita variáveis e funções.
$res->bindValue(":t", "8199831111");
$res->bindValue(":e", "goten_CorpCapsula@email.com");
$res->execute();
	*/

//2º forma
//$pdo->query("INSERT INTO pessoa(nome,telefone,email) VALUES('Bulma','8155500','Bulma_capsula@email.com') ");//não precisa fazer nenhuma substituição, passamos valores diretos


//--------------------SELECT---------------------
$cmd = $pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
$cmd->bindValue(":id", 1);
$cmd->execute();
$resultado = $cmd->fetch(PDO::FETCH_ASSOC); //pega uma linha. Transforma em um Array
								//FETCH_ASSOC trás apenas os nomes das colunas do banco
//ou
//$cmd->fetchAll(); //todas as linhas

foreach ($resultado as $key => $value) {
	echo $key. ":" .$value. "<br>";
}
?>