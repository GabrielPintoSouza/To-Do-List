<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="../controller/control.php" method="post">
        <input type="hidden" name="controller"  value="UsuarioController">
        <input type="hidden" name="function"  value="autenticar">
        <input type="text" name="email" id="email" placeholder="Insira aqui o seu e-mail">
        <input type="password" name="password" id="password" placeholder="Digite a sua senha">
        <button type="submit">Entrar</button>
    </form>
</body>
</html>