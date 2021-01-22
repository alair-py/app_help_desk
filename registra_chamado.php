<?php

    session_start();

    //Montagem do texto
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;


    //Abrindo arquivo
    //metodo certo escondendo o arquivo no sistema operacional fora do diretorio publico para que HTTP não tenha acesso
    //$arquivo =fopen('../../app_help_desk/arquivo.txt', 'a');

    //metodo apenas para uplod no github e não quebrar aplicacao
    $arquivo = fopen('arquivo.txt', 'a');


    //Escrevendo arquivo
    fwrite($arquivo, $texto);

    //Fechando arquivo
    fclose($arquivo);




    //Redirecionamento 
    header('Location: abrir_chamado.php');

?>