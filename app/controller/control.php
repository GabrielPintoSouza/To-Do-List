<?php
//Arquivos necessários
require_once 'UsuarioController.php';

// Verifica se foi recebida uma solicitação POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados JSON do corpo da solicitação
    $json_data = file_get_contents("php://input");

    // Converte os dados JSON em um array associativo
    $obj = json_decode($json_data, true);

    // Verifica se os dados foram decodificados com sucesso
    if (!$obj || empty($obj)) {
        $usuarioController = new UsuarioController();
        $usuarioController->registrar($obj['nome'], $obj['email'], $obj['senha']);
        http_response_code(200);
        exit('Cadastro realizado com sucesso!');
    }else{
        http_response_code(400);
        exit('Falha na comunicação');
    }
}
