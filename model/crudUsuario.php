<?php
	include 'conexaoBD.php';
	function cadastrarUsuario($nome, $descricao, $senha, $tipo) {
		conectar();
		query("INSERT INTO usuario (nome, descricao, senha, tipo) VALUES ('$nome', '$descricao', '$senha', '$tipo')");
		fechar();
	}

	function removerUsuario($codigoUsuario) {
		conectar();
		query("DELETE FROM usuario WHERE codigoUsuario = $codigoUsuario");
		fechar();
	}

	function mostrarUsuarioAlterar($codigoUsuario) {
		conectar();
		$resultado = query("SELECT * FROM usuario WHERE codigoUsuario=$codigoUsuario");
		fechar();
		return $resultado;
	}

	function alterarUsuario($codigoUsuario, $nome, $descricao, $tipo, $senha) {
		conectar();
		if ($senha != '') {
			query("UPDATE usuario SET nome = '$nome', descricao='$descricao', tipo ='$tipo', senha='$senha' WHERE codigoUsuario=$codigoUsuario");
		} else {
			query("UPDATE usuario SET nome = '$nome', descricao='$descricao', tipo ='$tipo' WHERE codigoUsuario=$codigoUsuario");
		}
		fechar();
	}

	function consultarUsuario($nome) {
		conectar();
		$resultado = query("SELECT * FROM usuario WHERE nome = '$nome'");
		fechar();
		return $resultado;
	}

	function mostrarUsuarios() {
		conectar();
		$resultado = query("SELECT * FROM usuario");
		fechar();
		return $resultado;
	}

	function excluirUsuario($codigoUsuario) {
		conectar();
		query("DELETE FROM usuario WHERE codigoUsuario=$codigoUsuario");
		fechar();
	}
?>