<?php

namespace App\Controllers;

use Models\Message;

class TestController extends controller
{
    public function index()
    {
        return $this->view('myPage.index');
    }

    public function test()
    {
        $message = new Message($this->getDB());
        $allMessage = $message->getAllMessage();
        var_dump($allMessage);
        exit;
        return $this->view('myPage.test');
    }

    public function hello()
    {
        return $this->view('myPage.hello');
    }

}