<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
		<link rel="stylesheet" href="../dist/css/theme.css" type="text/css">
		<link rel="shortcut icon" href="../imagens/icone.ico">
    	<title>Nightwind - Modal</title>
	</head>
	<body>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-
		KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-
		ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-
		JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<?php
			function modalConfirmacao() {
				?>
					<div class="modal" tabindex="-1" role="dialog" id="telaModal" data-backdrop="static">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"><?php echo $_SESSION['mensagem'];?></h5>
								</div>
								<div class="modal-footer">
									<a class="btn btn-primary" href="<?php echo $_SESSION['local']; ?>">Ok</a>
								</div>
							</div>
						</div>
					</div>
					<script>
						$('#telaModal').modal('show')
					</script>
				<?php
			}
			
			function modalDesejaExcluirUsuario($codigo) {
				?>
					<div class="modal" tabindex="-1" role="dialog" id="telaModalExcluir" data-backdrop="static">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Deseja realmente excluir este usuário?</h5>
								</div>
								<div class="modal-footer">
									<form method="post" action="controleUsuario.php">
										<input type="hidden" name="codigoUsuario" value="<?php echo $codigo; ?>">
										<button type="submit" class="btn btn-danger" name="opcao" value="ExcluirSim">Sim</button>
										<a class="btn btn-primary" href="../alterarUsuario.php?codigo=<?php echo $codigo; ?>">Não</a>
									</form>
								</div>
							</div>
						</div>
					</div>
					<script>
						$('#telaModalExcluir').modal('show')
					</script>
				<?php
			}

			function modalDesejaExcluirProjeto($codigo, $imagemAntiga) {
				?>
					<div class="modal" tabindex="-1" role="dialog" id="telaModalExcluir" data-backdrop="static">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Deseja realmente excluir este projeto?</h5>
								</div>
								<div class="modal-footer">
									<form method="post" action="controleProjeto.php">
										<input type="hidden" name="codigoProjeto" value="<?php echo $codigo; ?>">
										<input type="hidden" name="imagemAntiga" value="<?php echo $imagemAntiga; ?>">
										<button type="submit" class="btn btn-danger" name="opcao" value="ExcluirSim">Sim</button>
										<a class="btn btn-primary" href="../gerenciarProjetos.php?codigo=<?php echo $codigo; ?>">Não</a>
									</form>
								</div>
							</div>
						</div>
					</div>
					<script>
						$('#telaModalExcluir').modal('show')
					</script>
				<?php
			}
		?>

		<nav style="padding: 0px;" class="navbar bg-white border fixed-bottom">
	      &emsp;Plataforma desenvolvida pelo grupo Nightwind - CTISM - Cezar Augusto Crummenauer
	    </nav>
	</body>
</html>