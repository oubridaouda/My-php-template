<?php

use Router\Router;

//Le namespace du Router

require '../vendor/autoload.php';//Pour beneficier des namespaces directement à partir de l'autoloader

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR); //definir le repertoire view
define('SCRIPT', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR); //definir le repertoire des scripts

//creation d'une nouvelle instance de Router

$router = new Router($_GET['url']);

//var_dump($_GET['url']);

/*Les routes*/

//Connexion

//Route du site
$router->get('/', 'App\Controllers\TestController@index');
$router->get('/test', 'App\Controllers\TestController@test');
$router->get('/hello', 'App\Controllers\TestController@hello');

try {
// execution de la function run qui renvoie les vues
    $router->run();

} catch (Exception $e) {
    echo $e;
}