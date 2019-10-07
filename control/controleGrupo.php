<?php
	include '../model/crudVenda.php';
	session_start();
	$opcao = $_GET['opcao'];
	if ($opcao == 'tirarSelecao') {
		$codigoProduto = $_GET['codigo'];
		excluirVenda($_SESSION['codigoUsuario'], $codigoProduto);
		header("Location: ../view/tirarSelecao.php");
	} elseif ($opcao == 'selecionar') {
		$codigoProduto = $_GET['codigo'];
		inserirVenda($_SESSION['codigoUsuario'], $codigoProduto);
		header("Location: ../view/selecionar.php");
	}
?>