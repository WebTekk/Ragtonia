<?php

namespace App\Controller;

use App\Service\Contact\Games;
use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FormController
 */
class GamesController extends AppController
{
    /**
     * Default GET method
     *
     * @return Response
     */
    public function index()
    {
        $flash = session()->getFlashBag()->all();
        return $this->render('view::Games/games.html.php', ['flash' => $flash]);
    }
}
