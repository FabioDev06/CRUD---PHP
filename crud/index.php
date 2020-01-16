<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title>Sistema - Início</title>
</head>
<body>

	<div id="topo">
		Sistema para estudo
	</div>

	<div id="itens">
		<a href="cadastro-pessoa.php?pagina=pessoa">Pessoa</a>
		<a href="#">Cliente</a>
		<a href="#">Produto</a>
	</div>

	<?php
	
	if(isset($_REQUEST['pagina'])){
		$pagina = $_REQUEST['pagina'];

	if($pagina == "pessoa"){
		include("cadastro-pessoa.php");
	}

}
	?>
</body>
</html>