<?php

namespace App\Controller;

use App\Service\Contact\ContactForm;
use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FormController
 */
class ContactController extends AppController
{
    /**
     * Default POST method
     *
     * @return Response
     */
    public function submit()
    {
        $request = request();
        $post = $request->request->all();
        $files = $request->files->all();

        $form = new ContactForm();
        $viewData = $form->submitForm($post, $files);
        $viewData['data'] = $post;
        if (!empty($viewData['errors'])) {
            return $this->render('view::Form/form.html.php', $viewData);
        } else {
            session()->getFlashBag()->set('success', __('Vielen Dank. Wir werden Sie schnellstmöglich kontaktieren.'));
            return $this->redirect('/contact');
        }
    }

    /**
     * Default GET method
     *
     * @return Response
     */
    public function index()
    {
        $flash = session()->getFlashBag()->all();
        return $this->render('view::Form/form.html.php', ['flash' => $flash]);
    }
}
