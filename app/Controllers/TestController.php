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
        try {
            $message = new Message($this->getDB());
            $allMessage = $message->getAllMessage();
            echo "<pre>";
            var_dump($allMessage);
            echo "<pre>";
            exit;
        } catch (\Exception $exception) {
            echo "<pre>";
            var_dump($exception->);
            echo "<pre>";
        }

        return $this->view('myPage.test');
    }

    public function hello()
    {
        return $this->view('myPage.hello');
    }

}