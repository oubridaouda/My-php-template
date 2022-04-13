<?php

namespace Controller;

class ExchangeController extends controller
{
    public function index()
    {
        return $this->view('myPage.index');
    }

    public function exchanger()
    {
        return $this->view('myPage.exchangerList');
    }

    public function compare()
    {
        return $this->view('myPage.compare');
    }

}