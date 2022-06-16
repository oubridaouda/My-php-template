<?php

namespace App\Controllers;

class TestController extends controller
{
    public function index()
    {
        return $this->view('myPage.index');
    }

    public function test()
    {
        return $this->view('myPage.test');
    }

    public function hello()
    {
        return $this->view('myPage.hello');
    }

}