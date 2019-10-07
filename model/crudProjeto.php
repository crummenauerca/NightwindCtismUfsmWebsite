<?php
	include 'conexaoBD.php';

	function cadastrarProjeto($nome, $descricao, $conteudo, $codigoUsuarioAtual, $caminhoImagem) {
		conectar();
		query("INSERT INTO projeto (nome, descricao, conteudo, codigoUsuario, imagemLocal) VALUES ('$nome', '$descricao', '$conteudo', $codigoUsuarioAtual, '$caminhoImagem')");
		fechar();
	}

	function mostrarProjetoAlterar($codigoProjeto) {
		conectar();
		$resultado = query("SELECT * FROM projeto WHERE codigoProjeto = $codigoProjeto");
		fechar();
		return $resultado;
	}

	function alterarProjeto($codigoProjeto, $nome, $descricao, $conteudo, $caminhoImagem) {
		conectar();
		query("UPDATE projeto SET nome = '$nome', descricao='$descricao', conteudo = '$conteudo', situacao = 'Aguardando aprovação', imagemLocal = '$caminhoImagem' WHERE codigoProjeto=$codigoProjeto");
		fechar();
	}

	function excluirProjeto($codigoProjeto) {
		conectar();
		query("DELETE FROM projeto WHERE codigoProjeto=$codigoProjeto");
		fechar();
	}

	function mostrarProjetos() {
		conectar();
		$resultado = query("SELECT *, usuario.nome as nomeUsuario, projeto.nome as nome FROM projeto, usuario where projeto.codigoUsuario=usuario.codigoUsuario ORDER BY projeto.codigoProjeto DESC");
		fechar();
		return $resultado;
	}

	function mostrarProjetosNaoAprovados() {
		conectar();
		$resultado = query("SELECT * FROM projeto WHERE situacao != 'Aprovado' OR situacao IS NULL");
		fechar();
		return $resultado;
	}

	function mostrarProjetosAprovados() {
		conectar();
		$resultado = query("SELECT * FROM projeto WHERE situacao = 'Aprovado'");
		fechar();
		return $resultado;
	}

	function mostrarProjetosPesquisar($pesquisa) {
		conectar();
		$resultado = query("SELECT * FROM projeto WHERE descricao LIKE '%$pesquisa%' OR nome LIKE '%$pesquisa%' OR conteudo LIKE '%$pesquisa%' ORDER BY nome");
		fechar();
		return $resultado;
	}

	function aprovarProjeto($codigoProjeto) {
		conectar();
		query("UPDATE projeto SET situacao = 'Aprovado' WHERE codigoProjeto=$codigoProjeto");
		fechar();
	}

	function reprovarProjeto($codigoProjeto) {
		conectar();
		query("UPDATE projeto SET situacao = 'Reprovado' WHERE codigoProjeto=$codigoProjeto");
		fechar();
	}
?>