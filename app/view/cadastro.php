<?php
    session_start();
    require_once '../helper/Message.php';
    $messageObject = new Message();
    $message = $messageObject->getMessage()
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
    <?php $messageObject->destroyMessage(); endif;?>
    <h1>Formulário de Cadastro</h1>
    <form action="../controller/control.php" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email">
        
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">

        <label for="senha-confirm">Confirmação de senha</label>
        <input type="password" name="senha-confirm" id="senha-confirm">
        
        <input type="hidden" name="controller" value="UsuarioController">
        <input type="hidden" name="function" value="registrar">
        <button type="submit" id="cadastrar-usuario">Confirmar Cadastro</button>
    </form>
</body>
</html>