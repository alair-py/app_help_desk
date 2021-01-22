<?php
    session_start();

    //remover indices do array de sessão
    //unset() remove o indice apenas se existir, não da erro.
    //unset($_SESSION['autenticado']);



    
    //destruir a variavel de sessão
    //session_destroy() [necessario forçar redirecionamento]
    session_destroy();
    header('Location: index.php');

?>