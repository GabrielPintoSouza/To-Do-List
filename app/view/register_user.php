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

    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">


    <!-- CSS Login Page -->
    <link rel="stylesheet" href="../public/css/reset.css">
    <link rel="stylesheet" href="../public/css/register_user.css">

    <link rel="shortcut icon" href="../public/imgs/list-check.svg" type="image/x-icon">
    <title>Página de cadastro</title>
</head>

<body>
    <?php if ($message && !empty($message)): ?>
        <div class="message-container"><?= $message ?></div>
    <?php $sessionObject->destroyMessage();
    endif; ?>

    <div class="div-register-form">
        <h1>Formulário de Cadastro</h1>
        <form action="../controller/control.php" method="POST">

            <div class="div-inputs">
                <div class="input-form">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Digite o seu nome de usuário">
                </div>

                <div class="input-form">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" placeholder="Digite o seu e-mail de acesso">
                </div>

                <div class="input-form">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" placeholder="Mínimo de 6 dígitos">
                </div>

                <div class="input-form">
                    <label for="password-confirm">Confirmação de senha</label>
                    <input type="password" name="password-confirm" id="password-confirm" placeholder="Repita a senha">
                </div>

                <input type="hidden" name="controller" value="UserController">
                <input type="hidden" name="function" value="register">
            </div>

            <button type="submit" id="cadastrar-usuario">Cadastrar</button>
        </form>

        <div class="icon-register">
            <i class="bi bi-pencil-square"></i>
        </div>

        <div class="slogan">
            <p><span>To do List,</span> ajudando a cumprir seus objetivos!</p>
        </div>
    </div>

</body>

</html>