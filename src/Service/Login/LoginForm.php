<?php

namespace App\Service\Login;

use App\Service\AppService;

/**
 * Class LoginForm
 */
class LoginForm extends AppService
{
    /**
     * Get last Referer's Route
     *
     * @return string New Route
     */
    public function getLastRoute()
    {
        $request = request();
        $ref = $request->headers->get("referer");

        $expRef = explode('/', $ref);
        $lastRoute = $expRef[count($expRef) - 1];
        $newRoute = '/' . $lastRoute;
        return $newRoute;
    }

    public function validateLogin($post)
    {
        $validate = new LoginFormValidation();
        $validate->validateLogin($post);
    }

    public function validateLoginDb($post)
    {
        $query = db()->newQuery();
        $query->select('*')->from('users')->where([
            'email' => $post['login_email']
        ]);
        $row = $query->execute()->fetch('assoc');
        if (password_verify($post['login_password'], $row['password'])) {
            return true;
        }
        return false;
    }
}
