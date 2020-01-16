<?php

require_once 'classe-pessoa.php';

	//parâmetros da classe pessoa, do Banco de Dados
$p = new Pessoa("crudpdo","localhost","root","");
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="cad_pessoa.css">
	<meta charset="utf-8">
	<title>CADASTRO - PESSOA</title>
</head>
<?php

if(isset($_POST['nome'])){
	$nome = addslashes($_POST['nome']); //evita SQLinjection
	$telefone = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);

	if(!empty($nome) && !empty($telefone) && !empty($email)){

		if(!$p->cadastrarPessoa($nome,$telefone,$email)){		
			echo "Email já cadastrado!";
		}

	}else{
		echo "Preencha todos os campos!";
	}
}

?>

<body>


	<section id="esquerda">
		<form method="POST">
			<h2>CADASTRO DE PESSOA</h2><br>
			<label>NOME</label><br>
			<input type="text" name="nome"><br>

			<label>TELEFONE</label><br>
			<input type="tel" name="telefone"><br>

			<label>EMAIL</label><br>
			<input type="email" name="email"><br>
			<input type="submit">

		</form>
	</section>

	<section id="direita">
		<table>
			<tr id="titulo">
				<td>Nome</td>
				<td>Telefone</td>
				<td colspan="2">Email</td>
			</tr>

	<?php
		$dados = $p->buscarDados();
		if(count($dados) > 0){
			for ($i=0; $i < count($dados) ; $i++) { 
					echo "<tr>";
				foreach ($dados[$i] as $k => $v) {
					if($k != "id"){
						echo "<td>".$v."</td>";
					}
				}
				?>
					<td><a href="#">Editar</a> <a href="#">Excluir</a></td>
				<?php
					echo "</tr>";
			}

		}else{
			echo "Banco vazio!";
		}
	?>

		</table>
	</section>

</body>
</html>