<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AppController
{
    /**
     * Call Action.
     *
     * @param $method
     * @param Request|null $request
     * @param Response|null $response
     * @return mixed|null|RedirectResponse
     */
    public function callAction($method, Request $request = null, Response $response = null)
    {
        $newResponse = $this->beforeAction($request, $response);
        if ($newResponse instanceof Response) {
            return $newResponse;
        }

        $result = call_user_func_array([$this, $method], [$request, $response]);
        return $result;
    }

    /**
     * Execute before action.
     * This code always execute before any action.
     *
     * @param Request|null $request
     * @param Response|null $response
     * @return null|RedirectResponse
     */
    protected function beforeAction(Request $request = null, Response $response = null)
    {
        $session = session();
        $auth = $request->attributes->get("_auth");
        $route = $request->attributes->get("_route");
        $ip = $request->server->get("REMOTE_ADDR");



        if ($route != '/contact' && $session->get('last_activity') < time() - 600) {
            $session->set('last_activity', time());
            return $this->redirect("/");
        }
        $session->set('last_activity', time());

        if ($auth !== false && !$this->validateSession()) {
            logger()->warning($ip . ' failed to login');
            return $this->redirect("/");
        }
        return null;
    }


    /**
     * Render template.
     * Render html template with variables.
     *
     * @param String $file File to render.
     * @param array $viewData Required data to render file.
     * @return Response Return new response.
     */
    protected function render($file, array $viewData = [])
    {
        $templates = view();
        $viewData = $this->getData($viewData);
        $templates->addData($viewData);
        $content = $templates->render($file, $viewData);
        $response = response();
        $response->setContent($content);
        return $response;
    }

    /**
     * Merge data.
     * Merge $data array with role and baseurl.
     *
     * @param array $data All data.
     * @return array All data.
     */
    protected function getData($data = [])
    {
        $default = [
            'admin' => $this->hasRole("admin"),
            'baseurl' => baseurl("/")
        ];
        $result = array_merge($default, $data);
        return $result;
    }

    /**
     * Get Role.
     * Get user's role.
     *
     * @param string $role Role to check (admin/user).
     * @return bool true if role in session.
     */
    protected function hasRole($role)
    {
        $right = session()->get("role");
        $result = in_array($right, (array)$role);
        return $result;
    }

    /**
     * Redirect.
     * Redirect to url.
     *
     * @param String $url Url.
     * @param bool $base Required directory.
     * @return RedirectResponse Return redirect.
     */
    protected function redirect($url, $base = true)
    {
        if ($base) {
            $url = baseurl($url);
        }
        return new RedirectResponse($url);
    }

    /**
     * Validate Session.
     * Check if user is logged in.
     *
     * @return bool Return true if user is logged in.
     */
    protected function validateSession()
    {
        if (empty(session()->get('user'))) {
            return false;
        }
        return true;
    }

    /**
     * Role validation.
     * Check user's role.
     *
     * @return bool Return true if user is admin.
     */
    protected function isAdmin()
    {
        if (session()->get('role') == 'admin') {
            return true;
        }
        return false;
    }
}
