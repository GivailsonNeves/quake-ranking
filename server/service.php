<?php 

    // imports necessários
    require_once( getcwd() . "/utils/service.php");

    //modificação de cabeçalho para retornar json e retirar o cors geral
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");

    //instancia da classe de tratamento de chamada de serviços
    $service = new ServiceRequest();    

    //códifica o resultado em formato json
    echo json_encode($service->process_request());

    //modifica o status de retorno http para que corresponda ao resultado da operação
    http_response_code($service->get_code_return());
?>