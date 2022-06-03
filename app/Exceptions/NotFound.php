<?php

namespace App\Exceptions;

use Throwable;

class NotFound extends \Exception
{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    protected function view(string $path, array $params = null)
    {

        ob_start();

        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';

        $content = ob_get_clean();
        require VIEWS . 'layout.php';

    }

    public function error404()
    {
        http_response_code(404);
        return $this->view('404-error.index');
    }

}