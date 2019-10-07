$(function() {
	//pesquisar sem refresh na página
	$('#pesquisa').keyup(function() { //recebendo enquanto está digitando
		//#pesquisa - pega pelo id do visualizarInformatica.php
		var pesquisa = $(this).val(); //receber o valor que está sendo digitado
		if (pesquisa != '') { //verificar se há algo digitado
			var dados = { //cria objeto para enviar para buscar no banco
				palavra : pesquisa //atribuir pesquisa a palavra –
				//como se fosse no html: name="palavra"
			}
			$.post('busca.php', dados, function(retorna) {
			//mostra dentro da table os resultados obtidos
				$(' .table-results ').html(retorna); //id retornar valores
			//igual ao nome da class de visualizarInformatica.php
			});
		} else { //enquanto o usuario não digitar nada aparecer tudo
			var dados = {
				palavra : "tudo"
			}
			$.post('busca.php', dados, function(retorna) {
				$(' .table-results ').html(retorna);
			});
		}
	});
});