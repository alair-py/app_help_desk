<?php

  require_once("validador_acesso.php");


  //Array para chamados
  $chamados = array();


  //Abrir arquivo.txt

  ////metodo certo escondendo o arquivo no sistema operacional fora do diretorio publico para que HTTP não tenha acesso
  //$arquivo = fopen('../../app_help_desk/arquivo.txt', 'r');

  //metodo alternativo para upar no github sem quebrar aplicacao
  $arquivo = fopen('arquivo.txt', 'r');



  //Percorrer linhas do arquivo
  while(!feof($arquivo)) {

    $registro = fgets($arquivo);
    $chamados[] = $registro;

  }


  //Fecha arquivo.txt
  fclose($arquivo);
  
?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="logoff.php" class="nav-link">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              <h3>Consulta de chamado</h3>
            </div>
            
            <div class="card-body">
            
              <!--Percorre arquivo de chamados-->
              <? foreach($chamados as $chamado) { ?>

                <?php

                  $chamado_dados = explode('#', $chamado);

                  //Testa perfil do usuário para mostrar apenas chamados criados por ele
                  if($_SESSION['perfil_id'] === 2) {

                    if($_SESSION['id'] != $chamado_dados[0]) {
                      continue;
                    }

                  }

                  //Testa campos em branco no array e ignora-o caso tenha
                  if(count($chamado_dados) < 4) {
                    continue;
                  }

                ?>

                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"> <?=$chamado_dados[1]?> </h5>
                    <h6 class="card-subtitle mb-2 text-muted"> <?=$chamado_dados[2]?> </h6>
                    <p class="card-text"> <?=$chamado_dados[3]?> </p>

                  </div>
                </div>

              <? } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>