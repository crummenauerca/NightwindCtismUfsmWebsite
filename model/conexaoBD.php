<?php
	$conexao;
	date_default_timezone_set('America/Sao_Paulo');
	function conectar() {
		global $conexao;
		$conexao = mysqli_connect('localhost', 'root', 'kjh7d4f', 'nightwind') or die (mysqli_connect_error());
	}

	function fechar() {
		global $conexao;
		mysqli_close($conexao);
	}
	
	function query($sql) {
		global $conexao;
		mysqli_query($conexao, "SET CHARACTER SET utf8");
		$query = mysqli_query($conexao, $sql) or die (mysqli_query_error());
		return $query;
	}
?>