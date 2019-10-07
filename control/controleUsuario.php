<?php
	include '../model/crudUsuario.php';
	include '../modal.php';
	if (isset($_POST["opcao"])) {
		$opcao = $_POST["opcao"];
		if ($opcao == "Cadastrar Usuario") {
			$nome = preg_replace('/[^[:alpha:]_]/', '', $_POST["nome"]);
			$descricao = $_POST["descricao"];
			$senha = sha1($_POST["senha"]);
			$tipo = $_POST["tipo"];
			$resultado = consultarUsuario($nome);
			if (mysqli_num_rows($resultado) > 0) {
		    	$_SESSION['mensagem'] = 'Este nome de usuário já foi cadastrado!<br><br>Informe outro nome ou edite o cadastro anterior...';
				$_SESSION['local'] = '../administrarUsuarios.php';
				modalConfirmacao();
			} else {
				cadastrarUsuario($nome, $descricao, $senha, $tipo);
				$_SESSION['mensagem'] = 'Usuário cadastrado com sucesso';
				$_SESSION['local'] = '../administrarUsuarios.php';
				modalConfirmacao();
			}
		} elseif ($opcao == "Entrar") {
			$nome = preg_replace('/[^[:alpha:]_]/', '', $_POST["nome"]);
			$senha = sha1($_POST["senha"]);
			$tipoBanco = "null";
			$senhaBanco = "null";
			$nomeBanco = "null";
			$resultado = consultarUsuario($nome);
			while ($linha = mysqli_fetch_assoc($resultado)) {
				$nomeBanco = $linha['nome'];
				$senhaBanco = $linha['senha'];
				$tipoBanco = $linha['tipo'];
				$codigoBanco = $linha['codigoUsuario'];
			}
			if ($nome == $nomeBanco) {
				if ($senha == $senhaBanco) {
					session_start();
					$_SESSION['nome'] = $nomeBanco;
					$_SESSION['tipo'] = $tipoBanco;
					$_SESSION['codigoUsuarioAtual'] = $codigoBanco;
					header("Location: ../index.php");
				} else {
					$_SESSION['mensagem'] ='Senha Incorreta! Tente novamente';
					$_SESSION['local'] ='../acessar.php';
					modalConfirmacao();
				}
			} else {
				$_SESSION['mensagem'] ='Nome Incorreto! Tente novamente';
				$_SESSION['local'] ='../acessar.php';
				modalConfirmacao();
			}
		} elseif ($opcao == "Alterar") {
			$codigoUsuario = $_POST["codigoUsuario"];
			$nome = $_POST["nome"];
			$descricao = $_POST["descricao"];
			$tipo = $_POST["tipo"];
			$senha = sha1($_POST["senha"]);
			alterarUsuario($codigoUsuario, $nome, $descricao, $tipo, $senha);
			$_SESSION['mensagem'] ='Usuário alterado com sucesso';
			$_SESSION['local'] ='../administrarUsuarios.php';
			modalConfirmacao();
		} elseif ($opcao == "Excluir") {
			$codigoUsuario = $_POST["codigoUsuario"];
			modalDesejaExcluirUsuario($codigoUsuario);
		} elseif ($opcao == "ExcluirSim") {
			$codigoUsuario = $_POST["codigoUsuario"];
			excluirUsuario($codigoUsuario);
			$_SESSION['mensagem']='Usuário excluido com sucesso';
			$_SESSION['local']='../administrarUsuarios.php';
			modalConfirmacao();
		}
	} elseif (isset($_GET["opcao"])) {
		$opcao = $_GET["opcao"];
		if ($opcao == 'Sair') {
			session_start();
			session_destroy();
			header("Location: ../index.php");
		}
	}
?>