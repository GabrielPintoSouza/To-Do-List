<?php
    require_once '../helper/Session.php';
    $sessionObject = new Session();
    $message = $sessionObject->getMessage()
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="../public/js/cadastro.js"></script> -->
    <title>Página de cadastro</title>
</head>
<body>
    <?php if($message && !empty($message)):?>
        <div class="message-container"><?=$message?></div>
    <?php $sessionObject->destroyMessage(); endif;?>
    <h1>Formulário de Cadastro</h1>
    <form action="../controller/control.php" method="POST">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email">
        
        <label for="password">Senha</label>
        <input type="password" name="password" id="password">

        <label for="password-confirm">Confirmação de senha</label>
        <input type="password" name="password-confirm" id="password-confirm">
        
        <input type="hidden" name="controller" value="UserController">
        <input type="hidden" name="function" value="register">
        <button type="submit" id="cadastrar-usuario">Confirmar Cadastro</button>
    </form>
</body>
</html>