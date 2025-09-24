<?php
require_once '../helper/Session.php';
$sessionObject = new Session();

//Connection database
require_once '../dao/ConnectionDAO.php';
$pdo = ConnectionDAO::connect();

//Verify type of the request
$jsonRequest = (strpos($_SERVER['CONTENT_TYPE'], 'application/json') !=false ) ? json_decode(file_get_contents('php://input')) : false;

//Verify existence of the parameters
try {
    if ((!isset($jsonRequest->controller) && !isset($_REQUEST['controller'])) || (!isset($jsonRequest->function) && !isset($_REQUEST['function']))) {
        throw new InvalidArgumentException('Operação Inválida, controladora ou função estão faltando.', 400);
    }

    //Sanitizes the request parameters
    $controller = ($jsonRequest) ? filter_var($jsonRequest->controller, FILTER_SANITIZE_SPECIAL_CHARS) : filter_var($_REQUEST['controller'], FILTER_SANITIZE_SPECIAL_CHARS);
    $function = ($jsonRequest) ? filter_var($jsonRequest->function, FILTER_SANITIZE_SPECIAL_CHARS) : filter_var($_REQUEST['function'], FILTER_SANITIZE_SPECIAL_CHARS);

    //Functions that can be executes without authentication
    $whiteList = [
        'register',
        'auth',
    ];


    if (!$controller || !$function) {
        throw new InvalidArgumentException('Operação Inválida, controladora e função inválidas.', 400);
    }

    $controllerPath = $controller . '.php'; //Prepare the require path

    if (!file_exists($controllerPath)) {
        throw new InvalidArgumentException('Operação Inválida, arquivo da controladora inexistente', 400);
    }

    require_once($controllerPath);

    if (!class_exists($controller)) {
        throw new InvalidArgumentException('Operação Inválida, controladora inexistente', 400);
    }

    $dao = str_replace('Controller', PERSISTENCE_SUFFIX, $controller); //Change 'DAO' to your persistence class suffix
    $daoPath = '../dao/' . $dao . '.php';

    if (!file_exists($daoPath)) {
        throw new InvalidArgumentException('Operação Inválida, arquivo do dao inexistente', 400);
    }

    require_once($daoPath);

    if (!class_exists($dao)) {
        throw new InvalidArgumentException('Operação Inválida, dao inexistente', 400);
    }

    $daoObject = new $dao($pdo);
    $controllerObject = new $controller($daoObject); //Instance the controller type object

    if (!method_exists($controllerObject, $function)) {
        throw new InvalidArgumentException('Operação Inválida, método inexistente', 400);
    }

    //Unauthenticated user
    if (!$sessionObject->getUserId()) {
        if (!in_array($function, $whiteList)) {
            throw new InvalidArgumentException('Operação Inválida, usuário não autenticado', 403);
        }
    }

    $controllerObject->$function(); //Calls the controller function
} catch (InvalidArgumentException $e) {
    http_response_code($e->getCode());
    exit("Erro: {$e->getMessage()}");
}
