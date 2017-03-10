<?php

namespace App\Service\Login;


use Cake\Database\Query;

class LoginFormValidation
{
    public function validateLogin($post)
    {
        $res = 'ok';
        $valMail = $this->validateEmail($post['login_email']);
        $valPw = $this->validatePassword($post['login_password']);
        if (!$valMail || !$valPw) {
            return 'empty';
        }
        return $res;
    }

    protected function validateEmail($mail)
    {
        if (empty($mail)) {
            return false;
        }
        return true;
    }

    protected function validatePassword($pw)
    {
        if (empty($pw)) {
            return false;
        }
        return true;
    }


}
