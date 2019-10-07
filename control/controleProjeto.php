<?php
	session_start();
	error_reporting(0);
	include '../model/crudProjeto.php';
	include '../modal.php';
	$opcao = $_POST["opcao"];
	if ($opcao == "CadastrarProjeto") {
		$nome = $_POST["nome"];
		$descricao = $_POST["descricao"];
		$conteudo = $_POST["conteudo"];
		$codigoUsuarioAtual = $_SESSION['codigoUsuarioAtual'];
		$foto = $_FILES["imagem"];

		if (!empty($foto["name"])) {
			// Largura máxima em pixels
			$largura = 1920;
			// Altura máxima em pixels
			$altura = 1080;
			// Tamanho máximo do arquivo em bytes
			$tamanho = 2097152; // 2MB
	 
			$error = array();
	 
	    	// Verifica se o arquivo é uma imagem
	    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
	     	   $error[1] = "O arquivo selecionado não é uma imagem válida.";
	   	 	} 
		
			// Pega as dimensões da imagem
			$dimensoes = getimagesize($foto["tmp_name"]);
		
			// Verifica se a largura da imagem é maior que a largura permitida
			if($dimensoes[0] > $largura) {
				$error[2] = "A largura da imagem não pode ultrapassar ".$largura." pixels";
			}
	 
			// Verifica se a altura da imagem é maior que a altura permitida
			if($dimensoes[1] > $altura) {
				$error[3] = "Altura da imagem não pode ultrapassar ".$altura." pixels";
			}
			
			// Verifica se o tamanho da imagem é maior que o tamanho permitido
			if($foto["size"] > $tamanho) {
	   		 	$error[4] = "A imagem pode ter no máximo ".$tamanho." bytes (2MB)";
			}
	 
			// Se não houver nenhum erro
			if (count($error) == 0) {
			
				// Pega extensão da imagem
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
	 
	        	// Gera um nome único para a imagem
	        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
	 
	        	// Caminho de onde ficará a imagem
	        	$caminho_imagem = "../imagens/projetos/" . $nome_imagem;
	 
				// Faz o upload da imagem para seu respectivo caminho
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);
			
				// Insere os dados no banco
				//$sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");
			
				// Se os dados forem inseridos com sucesso
				cadastrarProjeto($nome, $descricao, $conteudo, $codigoUsuarioAtual, "./imagens/projetos/" . $nome_imagem);
				$_SESSION['mensagem'] = 'Projeto cadastrado com sucesso!<br>Ele foi enviado para avaliação...';
				$_SESSION['local'] = '../cadastrarProjetos.php';
				modalConfirmacao();
			} else {
				?>
					<!DOCTYPE html>
					<html>
					  <head>
					    <meta charset="utf-8">
					    <meta name="viewport" content="width=device-width, initial-scale=1">
					    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
					    <link rel="stylesheet" href="./dist/css/theme.css" type="text/css">
					    <link rel="shortcut icon" href="../imagens/icone.ico">
					    <title>Projetos Nightwind</title>
					  </head>
					  <body style="padding-top: 86px">
					    <nav class="navbar fixed-top navbar-expand-md bg-primary navbar-dark">
					      <div class="container">
					        <a class="navbar-brand" href="../index.php">
					          <img src="../imagens/icone.ico" alt="Logotipo do grupo de pesquisa Nightwind" width="48" style="padding-bottom: 6px;">
					          <b>Projetos Nightwind</b>
					        </a>
					        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					          <span class="navbar-toggler-icon"></span>
					        </button>
					        <div class="collapse navbar-collapse" id="navbarSupportedContent">
					          <ul class="navbar-nav mr-auto">
					            <li class="nav-item">
					              <a class="nav-link" href="../index.php">Visualizar projetos</a>
					            </li>
					            <?php
					              if (isset($_SESSION['nome'])) {
					                echo '
					                  <li class="nav-item">
					                    <a class="nav-link" href="../cadastrarProjetos.php">Cadastrar projetos</a>
					                  </li>
					                ';
					                if (($_SESSION['tipo'] == 'Administrador')) {
					                  echo '
					                    <li class="nav-item">
					                      <a class="nav-link" href="../administrarUsuarios.php">Administrar usuários</a>
					                    </li>
					                  ';
					                }
					              }
					            ?>
					          </ul>
					          <form class="form-inline m-0">
					            <?php
					              if (isset($_SESSION['nome'])) {
					                echo '<h6 class="text-white" style="padding-top: 8px;">', '<strong>', $_SESSION['nome'], '&nbsp</h6>';
					                echo'<a class="btn btn-secondary" href="../control/controleUsuario.php?opcao=Sair">Sair</a>';
					              } else {
					                echo'<a class="btn btn-secondary" href="../acessar.php">Acessar minha conta</a>';
					              }
					            ?>
					          </form>
					        </div>
					      </div>
					    </nav>
					    <div class="p-3">
					      <div class="container">
					        <div class="row">
					          <div class="col-md-2"></div>
					          <div class="col-md-8">
					            <div id="acessar" class="card text-black bg-white p-2">
					              <div class="card-body text-left">
					                <?php
					                	echo '
					                		<h2 class="mb-4 text-danger text-center">Erro ao processar a imagem do projeto</h2>
					                		<p>Problemas encontrados com o arquivo enviado: </p>
					                	';
						                // Se houver mensagens de erro, exibe-as
					                	echo '<ul>';
										if (count($error) != 0) {
											foreach ($error as $erro) {
												echo '<li>'. $erro . '</li>';
											}
										}
										echo '</ul>';
										cadastrarProjeto($nome, $descricao, $conteudo, $codigoUsuarioAtual, "./imagens/projetos/00padrão.jpg");
										echo '
											<br>
											<br>
											<h2 class="mb-4 text-success text-center">O projeto foi salvo com uma imagem padrão. Edite o projeto para tentar outra imagem...</h2>
											<br>
											<div class="text-center">
												<a class="btn btn-lg btn-secondary" href="../index.php">Ir para os projetos</a>
											</div>
										';
									?>
					              </div>
					            </div>
					          </div>
					        </div>
					      </div>
					    </div>
					    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
					    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
					    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
					  </body>
					</html>
				<?php
			}
		} else {
			cadastrarProjeto($nome, $descricao, $conteudo, $codigoUsuarioAtual, "./imagens/projetos/00padrão.jpg");
			$_SESSION['mensagem'] = 'Projeto cadastrado com sucesso!<br>Ele foi enviado para avaliação...<br><br>Uma imagem padrão foi atribuida ao projeto,<br>uma vez que nenhuma imagem foi selecionada.<br>Edite o projeto alterar a imagem...';
			$_SESSION['local'] = '../cadastrarProjetos.php';
			modalConfirmacao();
		}
	} elseif ($opcao == "Alterar") {
		$codigoProjeto = $_POST["codigoProjeto"];
		$nome = $_POST["nome"];
		$descricao = $_POST["descricao"];
		$conteudo = $_POST["conteudo"];
		$foto = $_FILES["imagem"];
		$imagemAntiga = $_POST["imagemAntiga"];

		if (!empty($foto["name"])) {
			// Largura máxima em pixels
			$largura = 1920;
			// Altura máxima em pixels
			$altura = 1080;
			// Tamanho máximo do arquivo em bytes
			$tamanho = 2097152; // 2MB
	 
			$error = array();
	 
	    	// Verifica se o arquivo é uma imagem
	    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
	     	   $error[1] = "O arquivo selecionado não é uma imagem válida.";
	   	 	} 
		
			// Pega as dimensões da imagem
			$dimensoes = getimagesize($foto["tmp_name"]);
		
			// Verifica se a largura da imagem é maior que a largura permitida
			if($dimensoes[0] > $largura) {
				$error[2] = "A largura da imagem não pode ultrapassar ".$largura." pixels";
			}
	 
			// Verifica se a altura da imagem é maior que a altura permitida
			if($dimensoes[1] > $altura) {
				$error[3] = "Altura da imagem não pode ultrapassar ".$altura." pixels";
			}
			
			// Verifica se o tamanho da imagem é maior que o tamanho permitido
			if($foto["size"] > $tamanho) {
	   		 	$error[4] = "A imagem pode ter no máximo ".$tamanho." bytes (2MB)";
			}
	 
			// Se não houver nenhum erro
			if (count($error) == 0) {
			
				// Pega extensão da imagem
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
	 
	        	// Gera um nome único para a imagem
	        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
	 
	        	// Caminho de onde ficará a imagem
	        	$caminho_imagem = "../imagens/projetos/" . $nome_imagem;
	 
				// Faz o upload da imagem para seu respectivo caminho
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);
			
				// Insere os dados no banco
				//$sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");
			
				// Se os dados forem inseridos com sucesso
				alterarProjeto($codigoProjeto, $nome, $descricao, $conteudo, "./imagens/projetos/" . $nome_imagem);
				if ($imagemAntiga != "./imagens/projetos/00padrão.jpg") {
					unlink('.' . $imagemAntiga);
				}
				$_SESSION['mensagem'] ='Projeto alterado com sucesso!<br>Ele foi enviado para avaliação...';
				$_SESSION['local'] ='../index.php';
				modalConfirmacao();
			} else {
				?>
					<!DOCTYPE html>
					<html>
					  <head>
					    <meta charset="utf-8">
					    <meta name="viewport" content="width=device-width, initial-scale=1">
					    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
					    <link rel="stylesheet" href="./dist/css/theme.css" type="text/css">
					    <link rel="shortcut icon" href="../imagens/icone.ico">
					    <title>Projetos Nightwind</title>
					  </head>
					  <body style="padding-top: 86px">
					    <nav class="navbar fixed-top navbar-expand-md bg-primary navbar-dark">
					      <div class="container">
					        <a class="navbar-brand" href="../index.php">
					          <img src="../imagens/icone.ico" alt="Logotipo do grupo de pesquisa Nightwind" width="48" style="padding-bottom: 6px;">
					          <b>Projetos Nightwind</b>
					        </a>
					        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					          <span class="navbar-toggler-icon"></span>
					        </button>
					        <div class="collapse navbar-collapse" id="navbarSupportedContent">
					          <ul class="navbar-nav mr-auto">
					            <li class="nav-item">
					              <a class="nav-link" href="../index.php">Visualizar projetos</a>
					            </li>
					            <?php
					              if (isset($_SESSION['nome'])) {
					                echo '
					                  <li class="nav-item">
					                    <a class="nav-link" href="../cadastrarProjetos.php">Cadastrar projetos</a>
					                  </li>
					                ';
					                if (($_SESSION['tipo'] == 'Administrador')) {
					                  echo '
					                    <li class="nav-item">
					                      <a class="nav-link" href="../administrarUsuarios.php">Administrar usuários</a>
					                    </li>
					                  ';
					                }
					              }
					            ?>
					          </ul>
					          <form class="form-inline m-0">
					            <?php
					              if (isset($_SESSION['nome'])) {
					                echo '<h6 class="text-white" style="padding-top: 8px;">', '<strong>', $_SESSION['nome'], '&nbsp</h6>';
					                echo'<a class="btn btn-secondary" href="../control/controleUsuario.php?opcao=Sair">Sair</a>';
					              } else {
					                echo'<a class="btn btn-secondary" href="../acessar.php">Acessar minha conta</a>';
					              }
					            ?>
					          </form>
					        </div>
					      </div>
					    </nav>
					    <div class="p-3">
					      <div class="container">
					        <div class="row">
					          <div class="col-md-2"></div>
					          <div class="col-md-8">
					            <div id="acessar" class="card text-black bg-white p-2">
					              <div class="card-body text-left">
					                <?php
					                	echo '
					                		<h2 class="mb-4 text-danger text-center">Erro ao processar a imagem do projeto</h2>
					                		<p>Problemas encontrados com o arquivo enviado: </p>
					                	';
						                // Se houver mensagens de erro, exibe-as
					                	echo '<ul>';
										if (count($error) != 0) {
											foreach ($error as $erro) {
												echo '<li>'. $erro . '</li>';
											}
										}
										echo '</ul>';
										alterarProjeto($codigoProjeto, $nome, $descricao, $conteudo, $imagemAntiga);
										echo '
											<br>
											<br>
											<h2 class="mb-4 text-success text-center">Todas as informações novas foram salvas.<br>A imagem de projeto antiga foi mantida. Edite novamente o projeto para tentar outra imagem...</h2>
											<br>
											<div class="text-center">
												<a class="btn btn-lg btn-secondary" href="../index.php">Ir para os projetos</a>
											</div>
										';
									?>
					              </div>
					            </div>
					          </div>
					        </div>
					      </div>
					    </div>
					    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
					    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
					    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
					  </body>
					</html>
				<?php
			}
		} else {
			alterarProjeto($codigoProjeto, $nome, $descricao, $conteudo, $imagemAntiga);
			$_SESSION['mensagem'] ='Projeto alterado com sucesso!<br>Ele foi enviado para avaliação...<br><br>A imagem de projeto antiga foi mantida.<br>Edite novamente o projeto alterar a imagem...';
			$_SESSION['local'] ='../index.php';
			modalConfirmacao();
		}
	} elseif ($opcao == "Excluir") {
		$codigoProjeto = $_POST["codigoProjeto"];
		$imagemAntiga = $_POST["imagemAntiga"];
		modalDesejaExcluirProjeto($codigoProjeto, $imagemAntiga);
	} elseif ($opcao == "ExcluirSim") {
		$codigoProjeto = $_POST["codigoProjeto"];
		$imagemAntiga = $_POST["imagemAntiga"];
		if ($imagemAntiga != "./imagens/projetos/00padrão.jpg") {
			unlink('.' . $imagemAntiga);
		}
		excluirProjeto($codigoProjeto);
		$_SESSION['mensagem']='Projeto excluido com sucesso';
		$_SESSION['local']='../index.php';
		modalConfirmacao();
	}
?>