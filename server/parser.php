<?php
    
    //imports necessários
    require_once( getcwd() . '/utils/parser.php');

    //instancia e chamada da classe que efetua o parser do arquivo .log
    $parser = new Parser();
    $feedback = $parser->convert();//conversão que devolve o feedbak do retorno

    //redirecionamento com feedback
    header("Location:index.php?feedback=$feedback");

?>