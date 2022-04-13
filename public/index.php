<?php

use Router\Router;

//Le namespace du Router

require '../vendor/autoload.php';//Pour beneficier des namespaces directement à partir de l'autoloader

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR); //definir le repertoire view
define('SCRIPT', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR); //definir le repertoire des scripts
const DB_NAME = 'e_commerce';
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PWD = '';

//creation d'une nouvelle instance de Router
$router = new Router($_GET['url']);

/*Les routes*/

//Connexion
$router->post('/signup', 'Controller\User\UserController@myPostMethode');

//Route du site
$router->get('/', 'Controller\ExchangeController@index');

$router->run(); // execution de la function run qui renvoie les vues

