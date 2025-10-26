<?php
require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'helper' . DIRECTORY_SEPARATOR . 'Session.php';
$sessionObject = new Session();

if (is_null($sessionObject->getUserId())) {
    http_response_code(403);
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS Home Page -->
    <link rel="stylesheet" href="../public/css/reset.css">

    <link rel="shortcut icon" href="../public/imgs/list-check.svg" type="image/x-icon">
    <title>Home</title>
</head>

<body>
    <header>
        <!--Adicionar div para menu-->
        <div class="menu" id="menu">
            
        </div>
    </header>
    <main>
        <h1>Página Inicial do Usuário</h1>

        <!--Adicionar div para boas vindas ao sistema e mensagens de feedback-->
        <!-- Adicionar div para exibição das tarefas-->
    </main>
    <footer>

    </footer>
</body>

</html>