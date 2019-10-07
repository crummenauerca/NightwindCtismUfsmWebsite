<?php
  session_start();
  error_reporting(0);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./dist/css/theme.css" type="text/css">
    <link rel="shortcut icon" href="./imagens/icone.ico">
    <title>Nightwind - Sobre</title>
  </head>
  <body>

    <div id="barra-brasil"><div id="wrapper-barra-brasil"><div class="brasil-flag"><a href="http://brasil.gov.br" class="link-barra">Brasil</a></div><span class="acesso-info"><a href="http://www.servicos.gov.br/?pk_campaign=barrabrasil" class="link-barra" id="barra-brasil-orgao">Serviços</a></span><nav><ul id="lista-barra-brasil" class="list"><li><a href="#" id="menu-icon"></a></li><li class="list-item first"><a href="http://www.simplifique.gov.br" class="link-barra">Simplifique!</a></li><li class="list-item"><a href="http://brasil.gov.br/barra#participe" class="link-barra">Participe</a></li><li class="list-item"><a href="http://brasil.gov.br/barra#acesso-informacao" class="link-barra">Acesso à informação</a></li><li class="list-item"><a href="http://www.planalto.gov.br/legislacao" class="link-barra">Legislação</a></li><li class="list-item last last-item"><a href="http://brasil.gov.br/barra#orgaos-atuacao-canais" class="link-barra">Canais</a></li></ul></nav><span id="brasil-vlibras"><a class="logo-vlibras" href="#"></a><span class="link-vlibras"><img src="//barra.brasil.gov.br/imagens/vlibras.gif">&nbsp;<br>O conteúdo desse portal pode ser acessível em Libras usando o <a href="http://www.vlibras.gov.br">VLibras</a></span></span></div></div>

    <div id="barra-ufsm"><div id="wrapper-barra-ufsm"><div class="ufsm-flag"><a href="http://www.ufsm.br" class="link-barra" style="display: list-item;"> </a></div><ul class="list"><li class="list-item first"><a href="http://site.ufsm.br/alunos/" class="link-barra">Alunos</a></li><li class="list-item"><a href="http://site.ufsm.br/servidores/" class="link-barra">Servidores</a></li><li class="list-item"><a href="http://site.ufsm.br/servicos/webmail" class="link-barra"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAATCAIAAADu5eFvAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAadEVYdFNvZnR3YXJlAFBhaW50Lk5FVCB2My41LjEwMPRyoQAAASxJREFUOE9j+NCoQl1ESxO3llpbxuYyBLWShFiDm1pz/DLTouDmIEzUiy46XWlUmBHGGNSCpg0Xkg2v3FNm0ZPrwx7cCDcHYSJQBW9I/YJClzXF9sKhtcg6sSLPhPRL1foBiSkQLsIcBAuqtCUpNfZClYFFbB5MBB0BfdqS7X+w3EwxohwuiDAHwULSox9dCAyBgoxwzBCA+LQ31xvoU2RxhDkIFpI0EPGBQsAZLQQgPg1MSoaLwBHCHAQLQxEwBFJSYyAhAPepUkQZhjIQQpiDYGEogiCD6MIzlUb7yrH4FBkhzEGwMBTBETAE5MMRkYAVIcxBsDAUkYQQ5iBYGIpIQghzECwMRSQhhDkIFoYikhDCHAQLQxFJCGEOgoWhiCSEMAfOohaitomNKgCmC1KWZfts9QAAAABJRU5ErkJggg=="> Webmail</a></li><li class="list-item"><a href="http://site.ufsm.br/servicos/moodle" class="link-barra"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB0AAAAUCAIAAAD+/qGQAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAadEVYdFNvZnR3YXJlAFBhaW50Lk5FVCB2My41LjEwMPRyoQAAAnVJREFUOE9j+NCoQgRSft+gBESv65U/NigBuRgK0BF+c5U/NoLM+tSgsKHY2jchJTk1+lyl/scGxbf1QKPxmY7LXOUPDUpv65Ue16rVZQXIhFcyBLXCkVlM3rwC5/cNiiDnN2J3Ppq5CAduLbEMTExmCWpGNhEZCYXW5qWHX6zSe1Ov9A4jcODmghz4pl75RZ1KZ463amQpmim4UYtjXNaqIruPDQrIzmcAsRoUvzQqHC43ik6O4whuxNBJFJIIq6rIDL5fqwE0Cmggw6dGkKEriuzlI8oFQ2vRVJOE1CNLpuW5AU0DIlA4XKrWYw5qnpLn/q5eCUgCpdE0EEItrvEZ20otgbECDElwUIDDty/XWz2y9H2DClAIKAGU3lhi7RafDtSAYQQK4gppSE2NBkYdMG0AUzdy1IHMnVvgKhte+a4BKgSUnpXv8rxOFZhU01KjgJrRjAMiYMprzfZ9Uqd2pUp3WaEDWmIAIpC5j+o0gZpnFrjBRYHpgTekPjst4nKVLlAz0AjZ8AqIiZaxuUsKHYBZY3uphU9CKmNQS2ZaFFwjHEHT2YQ8L4HQuvu1WhAuPJ0BtXknpG4ttQQatKbY9nC5CTCzzMh304kqgigAInzmAgMBmMIOlJtDuJjpF2gQMEqBKUk0rAZNCp+5bxpUgVlrd5klhEtKvsBr7vxCF7Gw6lf1ahAudcx926BqEF1YlhkKF6WOucBAqMgMuV2jAxe1iM1D04wHNWQHwDXCETQc0BDQDr/EVHZCZYVaZGlHji9Swkcg7OZCEDC4d5VZNmQHpqVFZ6RFZaVF5aZH5KdHFGWELSh0uYXkP0yEz1zyUaMKALcL3Kj+ijs1AAAAAElFTkSuQmCC"> Moodle</a></li><li class="list-item last last-item"><a href="http://nte.ufsm.br/zikazero/" class="link-barra">#ZikaZero</a></li></ul></div></div>

    <nav class="navbar navbar-expand-md bg-white border navbar-light" style="padding: 0px">
      <div class="container">
        <a href="http://www.ctism.ufsm.br/"><img src="./imagens/ctism.png" height="50" style="padding-right: 16px"></a>
        <a class="navbar-brand" href="./index.php">
          <img src="./imagens/icone.ico" alt="Logotipo do grupo de pesquisa Nightwind" width="50">
          <b>Nightwind</b>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="./index.php">Visualizar projetos</a>
            </li>
            <?php
              if (isset($_SESSION['nome'])) {
                echo '
                  <li class="nav-item">
                    <a class="nav-link" href="./cadastrarProjetos.php">Cadastrar projetos</a>
                  </li>
                ';
                if (($_SESSION['tipo'] == 'Administrador')) {
                  echo '
                    <li class="nav-item">
                      <a class="nav-link" href="./administrarUsuarios.php">Administrar usuários</a>
                    </li>
                  ';
                }
              }
            ?>
            <li class="nav-item">
              <a class="nav-link active" href="./sobre.php">Sobre</a>
            </li>
          </ul>
          <form class="form-inline m-0">
            <?php
              if (isset($_SESSION['nome'])) {
                echo '<h6 style="padding-top: 8px;">', '<strong>', $_SESSION['nome'], '&nbsp</h6>';
                echo'<a class="btn btn-secondary" href="./control/controleUsuario.php?opcao=Sair">Sair</a>';
              } else {
                echo'<a class="btn btn-secondary" href="./acessar.php">Acessar minha conta</a>';
              }
            ?>
          </form>
        </div>
      </div>
    </nav>
    <div class="py-1">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-primary pt-3">Sobre o grupo Nightwind</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="py-1">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <img style="padding: 10px;" class="img-fluid d-block mb-4 w-80" src="./imagens/nightwind.jpg">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" style="text-align: justify;">
            <p class="">O Grupo de Pesquisa NIGHTWIND - Criatividade e Inovação iniciou sua formação em 2016, e é fruto do anseio de alunos, professores e servidores do CTISM em construir um ambiente criativo e inovador para que ideias que envolvam o desenvolvimento de circuitos eletrônicos para as mais diversas áreas da sociedade - incluindo, mas não se limitando, à automação residencial, à automação comercial e à automação agrícola - tenham oportunidade de florescer. Além disso, é propósito do grupo atuar no sentido de colaborar para o aperfeiçoamento de procedimentos didáticos - em especial no ensino técnico e tecnológico - e desta forma ser um vetor para a construção de novos conhecimentos e para o aprimoramento de técnicas de ensino.</p>
            <p class="">
              Somos berço de diversas dissertações de mestrado e teses de doutorado - além de mais de uma dezena de registros no INPI. E nossa história está apenas começando.
            </p>

            <!--<div class="col-md-12">
              <div class="col-md-12">
                <img class="img-fluid d-block rounded-circle mx-auto" src="imagens/cezar.jpg">
              </div>
              <h2 class="py-2">
                <b>Cezar Augusto Crummenauer</b>
              </h2>
              <h5>Técnico em <b>Eletrônica</b><br>Técnico em <b>Informática</b><br>Acadêmico do Curso Técnico em <b>Automação Industrial</b><br>Acadêmico do Curso Superior em <b>Sistemas para Internet</b><br>Empresário Júnior na <b>CompAct Jr da UFSM</b></h5>
              <h2 class="text-primary">Um pouco sobre minhas <b>atividades acadêmicas</b>...</h2>
              <h5>Continue rolando esta página para <b>conhecer melhor minhas atividades acadêmicas</b> ou clique e um dos botões abaixo para ver outras informações sobre mim...</h5>
              <div class="text-center justify-content-center" id="navbar2SupportedContent">
                <a class="btn ml-2 text-white btn-secondary m-2" href="projetos.html">Projetos</a>
                <a class="btn text-black btn-outline-secondary m-2" href="index.html">Atividades acadêmicas</a>
                <a class="btn ml-2 text-white btn-secondary m-2" href="hobbies.html">Hobbies</a>
              </div>
            </div>-->

            <p class="">
              O grupo de Pesquisa NIGHTWIND é registrado no CNPq e certificado pela instituição.
            </p>
            <p class="" style="padding-bottom: 10px">
              Espelho do grupo:
              <a target="_blank" href="http://dgp.cnpq.br/dgp/espelhogrupo/4283150608624074">
                http://dgp.cnpq.br/dgp/espelhogrupo/4283150608624074
              </a> 
              <br>
              E-mail para contato
              <a href="mailto:nightwind@ctism.ufsm.br">nightwind@ctism.ufsm.br</a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <nav style="padding: 0px;" class="navbar bg-white border fixed-bottom">
      &emsp;Plataforma desenvolvida pelo grupo Nightwind - CTISM - Cezar Augusto Crummenauer
    </nav>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./dist/js/barraGov.js"></script>
    <script src="./dist/js/barraUfsm.js"></script>
  </body>
</html>