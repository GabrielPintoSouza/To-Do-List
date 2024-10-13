<?php
//Connection database
require_once '../dao/ConexaoDAO.php';
$pdo = ConexaoDAO::conectar();

//Sanitizes the request parameters
$controller = trim(htmlspecialchars($_REQUEST['controller']));
$function = trim(htmlspecialchars($_REQUEST['function']));

try {
    if (!$controller || !$function) {
        throw new InvalidArgumentException('Operação Inválida, controladora e função não definidas');
    }

    $controllerPath = $controller . '.php'; //Prepare the require path

    if (!file_exists($controllerPath)) {
        throw new InvalidArgumentException('Operação Inválida, arquivo da controladora inexistente');
    }

    require_once($controllerPath);

    if (!class_exists($controller)) {
        throw new InvalidArgumentException('Operação Inválida, controladora inexistente');
    }

    $dao = str_replace('Controller', PERSISTENCE_SUFFIX, $controller); //Change 'DAO' to your class persistence class suffix
    $daoPath = '../dao/'.$dao.'.php';

    if (!file_exists($daoPath)) {
        throw new InvalidArgumentException('Operação Inválida, arquivo do dao inexistente');
    }

    require_once($daoPath);

    if (!class_exists($dao)) {
        throw new InvalidArgumentException('Operação Inválida, dao inexistente');
    }

    $daoObject = new $dao($pdo);
    $controllerObject = new $controller($daoObject); //Instance the controller type object

    if (!method_exists($controllerObject, $function)) {
        throw new InvalidArgumentException('Operação Inválida, método inexistente');
    }

    $controllerObject->$function(); //Calls the controller function
} catch (InvalidArgumentException $e) {
    http_response_code(400);
    exit("Erro: {$e->getMessage()}");
}