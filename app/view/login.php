<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS Login Page -->
    <link rel="stylesheet" href="../public/css/reset.css">
    <link rel="stylesheet" href="../public/css/login.css">

    <link rel="shortcut icon" href="../public/imgs/list-check.svg" type="image/x-icon">
    <title>Login</title>
</head>

<body>
    <div class="div-login-form">

        <h1>Formulário de acesso</h1>

        <form action="../controller/control.php" method="post">
            <input type="hidden" name="controller" value="UserController">
            <input type="hidden" name="function" value="auth">

            <div class="input-form">
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" placeholder="Insira aqui o seu e-mail">
            </div>

            <div class="input-form">
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" placeholder="Digite a sua senha">
            </div>

            <button type="submit">Entrar</button>
        </form>

        <p>Não possuí uma conta? <a href="./register_user.php">Cadastre-se já!</a></p>

        <div class="icon-login">
            <i class="bi bi-box-arrow-in-right"></i>
        </div>

        <div class="slogan">
            <p><span>To do List,</span> ajudando a cumprir seus objetivos!</p>
        </div>
    </div>
</body>

</html>