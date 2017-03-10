<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController.
 */
class IndexController extends AppController
{
    /**
     * Default GET method.
     *
     * @return Response
     */
    public function index()
    {
        return $this->render('view::Index/index.html.php');
    }
}
