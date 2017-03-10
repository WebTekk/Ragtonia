<?php

namespace App\Controller;

use App\Service\Login\LoginForm;
use App\Service\Login\LoginFormValidation;

class LoginController extends AppController
{
    public function submit()
    {
        $login = new LoginForm();
        $request = request();
        $post = $request->request->all();
        $route = getLastRoute();
        $errors = $login->validateLogin($post);

        if ($errors == 'empty') {
            session()->getFlashBag()->set('empty', __('Fehler'));
            return $this->redirect($route);
        }
        if (!$login->validateLoginDb($post)) {
            session()->getFlashBag()->set('empty', __('Fehler'));
            return $this->redirect($route);
        }
        session()->set('email', $post['login_email']);
        return $this->redirect($route);
    }
}
