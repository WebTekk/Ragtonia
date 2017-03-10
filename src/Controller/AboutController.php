<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController.
 */
class AboutController extends AppController
{
    /**
     * Default GET method.
     *
     * @return Response
     */
    public function index()
    {
        $flash = session()->getFlashBag()->all();
        return $this->render('view::About/about.html.php', ['flash' => $flash]);
    }
}
