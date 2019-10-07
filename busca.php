<?php
  session_start();
	include './model/crudProjeto.php';
	$pesquisa = $_POST["palavra"];

	if ($pesquisa == "tudo") {
		$resultado = mostrarProjetos();
	} else {
		$resultado = mostrarProjetosPesquisar($pesquisa);
	}

  $existeResultadosValidos = 0;

	if (mysqli_num_rows($resultado) <= 0) {
    // Nenhum resultado...
	} else {
    ?>
      <div class="row">
    <?php
    while ($linha = mysqli_fetch_assoc($resultado)) {
      //$existeResultadosValidos = 0;
      $codigoProjeto = $linha['codigoProjeto'];
      $nome = $linha['nome'];
      // $descricao = $linha['descricao'];
      $situacao = $linha['situacao'];
      $imagemLocal = $linha['imagemLocal'];
      $codigoUsuario = $linha['codigoUsuario'];
      // $conteudo = $linha['conteudo'];
      if (!isset($_SESSION['nome'])) {
        if ($situacao == 'Aprovado') {
          $existeResultadosValidos = 1;
          echo "
            <div class='col-lg-3 col-md-4 col-sm-6 text-center' style='padding: 5px;'>
              <div class='card'>
                <img class='card-img-top border' src='".$imagemLocal."' alt='Imagem do projeto ".$nome."'>
                <div class='card-body'>
                  <h5 class='card-title'>$nome</h5>
                <div class='btn-group'>
                  <a href='visualizarProjeto.php?codigo=".$codigoProjeto."' class='btn btn-lg btn-primary'>Visualizar</a>
                </div>
                </div>
              </div>
            </div>
          ";
        }
      } else {
        if ($_SESSION['tipo'] == 'Administrador') {
          echo "
            <div class='col-lg-3 col-md-4 col-sm-6 text-center' style='padding: 5px;'>
          ";

          if ($situacao == 'Aprovado') {
            echo "
                <div class='card border-success'>
            ";
          } elseif ($situacao == 'Reprovado') {
            echo "
                <div class='card border-danger'>
            ";
          } else {
            echo "
                <div class='card border-warning'>
            ";
          }

          echo "
            <img class='card-img-top border' src='".$imagemLocal."' alt='Imagem do projeto ".$nome."'>
            <div class='card-body'>
            <h5 class='card-title'>$nome</h5>
          ";

          echo "
                <div class='btn-group' style='padding: 10px 10px 10px 0px;'>
          ";

          if ($situacao == 'Reprovado') {
            echo "
                  <a href='gerenciarProjetos.php?codigoParaAprovacao=".$codigoProjeto."' class='btn btn-outline-primary'>Aprovar</a>
                </div>
            ";
          } elseif ($situacao == 'Aprovado') {
            echo "
                  <a href='gerenciarProjetos.php?codigoParaReprovacao=".$codigoProjeto."' class='btn btn-outline-danger'>Reprovar</a>
                </div>
            ";
          } else {
            echo "
                  <a href='gerenciarProjetos.php?codigoParaAprovacao=".$codigoProjeto."' class='btn btn-outline-primary'>Aprovar</a>
                  <a href='gerenciarProjetos.php?codigoParaReprovacao=".$codigoProjeto."' class='btn btn-outline-danger'>Reprovar</a>
                </div>
            ";
          }
          echo "
                <div class='btn-group'>
                  <a href='visualizarProjeto.php?codigo=".$codigoProjeto."' class='btn btn-outline-primary'>Visualizar</a>
                  <a href='gerenciarProjetos.php?codigo=".$codigoProjeto."' class='btn btn-outline-secondary'>Gerenciar</a>
                </div>
                </div>
              </div>
            </div>
          ";
          $existeResultadosValidos = 1;
        } else {
          if ($_SESSION['tipo'] == 'Colaborador') {
            if ($situacao == 'Aprovado' && $codigoUsuario != $_SESSION['codigoUsuarioAtual']) {
              echo "
                <div class='col-lg-3 col-md-4 col-sm-6 text-center' style='padding: 5px;'>
                  <div class='card'>
              ";
            } elseif ($situacao == 'Aprovado') {
              echo "
                <div class='col-lg-3 col-md-4 col-sm-6 text-center' style='padding: 5px;'>
                  <div class='card border-success'>
              ";
            } elseif ($situacao == 'Reprovado' && $codigoUsuario == $_SESSION['codigoUsuarioAtual']) {
              echo "
                <div class='col-lg-3 col-md-4 col-sm-6 text-center' style='padding: 5px;'>
                  <div class='card border-danger'>
              ";
            } elseif ($codigoUsuario == $_SESSION['codigoUsuarioAtual']) {
              echo "
                <div class='col-lg-3 col-md-4 col-sm-6 text-center' style='padding: 5px;'>
                  <div class='card border-warning'>
              ";
            }

            if ($situacao == 'Aprovado' || $codigoUsuario == $_SESSION['codigoUsuarioAtual']) {
              echo "
                <img class='card-img-top border' src='".$imagemLocal."' alt='Imagem do projeto ".$nome."'>
                <div class='card-body'>
                <h5 class='card-title'>$nome</h5>
              ";
              $existeResultadosValidos = 1;
            }

            if ($codigoUsuario == $_SESSION['codigoUsuarioAtual']) {
              echo "
                  <div class='btn-group' style='padding: 10px 10px 10px 0px;'>
                    <a href='visualizarProjeto.php?codigo=".$codigoProjeto."' class='btn btn-outline-primary'>Visualizar</a>
                    <a href='gerenciarProjetos.php?codigo=".$codigoProjeto."' class='btn btn-outline-secondary'>Gerenciar</a>
                  </div>
                  </div>
                </div>
              </div>
              ";
            } elseif ($situacao == 'Aprovado') {
              echo "
                <div class='btn-group'>
                  <a href='visualizarProjeto.php?codigo=".$codigoProjeto."' class='btn btn-lg btn-primary'>Visualizar</a>
                </div>
                </div>
                </div>
              </div>
              ";                          
            }
          }
        }
      }
    }
  } 
  if ($existeResultadosValidos == 0) {
    echo '<p class="text-warning">Nenhum nome ou descrição ou conteúdo de projeto corresponde com a pesquisa...</p>';
  }
?>