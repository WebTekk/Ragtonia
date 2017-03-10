<?php

namespace App\Controller;

/**
 * Class LanguageController
 */
class LanguageController extends AppController
{
    public function language()
    {
        $session = session();
        $request = request();
        $lang = $request->query->get('lang');
        $session->set('lang', $lang);
        $referer = $request->headers->get('referer');
        return $this->redirect($referer, false);
    }
}
