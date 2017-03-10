<?php

namespace App\Controller;


class LogoutController extends AppController
{
    public function index()
    {
        $route = getLastRoute();
        session()->clear();
        return $this->redirect($route);
    }
}
