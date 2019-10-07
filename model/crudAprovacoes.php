<?php
	include 'conexaoBD.php';
	function mostrarProdutosSelecionados($codigoUsuario) {
		conectar();
		$resultado = query("
			SELECT codigoProduto, descricao, codigoDeBarrasUPC , valor
			FROM produto, venda
			WHERE venda.codigoUs = $codigoUsuario AND venda.codigoPr = produto.codigoProduto
		");
		fechar();
		return $resultado;
	}

	function mostrarProdutos($codigoUsuario) {
		conectar();
		$resultado = query("
			SELECT codigoProduto, descricao, valor, codigoDeBarrasUPC FROM produto
			WHERE codigoProduto NOT IN (
				SELECT codigoProduto FROM produto, venda
				WHERE venda.codigoUs = $codigoUsuario AND venda.codigoPr = produto.codigoProduto
			)
		");
		fechar();
		return $resultado;
	}

	function inserirVenda($codigoCliente, $codigoProduto) {
		conectar();
		query("INSERT INTO venda (codigoUs, codigoPr) VALUES ($codigoCliente, $codigoProduto)");
		fechar();
	}

	function excluirVenda($codigoCliente, $codigoProduto) {
		conectar();
		query("DELETE FROM venda WHERE codigoUs = $codigoCliente AND codigoPr = $codigoProduto");
		fechar();
	}

	function obterTotal($codigoUsuario) {
		conectar();
		$resultado = query("
			SELECT round(sum(valor), 2) as resultado
			FROM produto, venda
			WHERE venda.codigoUs = $codigoUsuario AND venda.codigoPr = produto.codigoProduto
		");
		fechar();
		return $resultado;
	}
?>