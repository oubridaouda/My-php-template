<?php

namespace Controller;

abstract class controller
{

    protected $db;

    //Initilisation de l'instance de connexion accessible a tout les enfant du controller
    public function __construct()
    {
        //Si la session est activé et inexistante la demarrer
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    protected function view(string $path, array $params = null)
    {

        ob_start();

        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';

        $content = ob_get_clean();
        require VIEWS . 'layout.php';

    }

}