<?php

namespace App\Controllers;

use App\Auth\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Team;
use App\Models\User;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['username'], $formData['password']);
            if ($logged) {
                return $this->redirect('?');
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return \App\Core\Responses\ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect('?c=home');;
    }

    public function register(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $registered = null;
        if (isset($formData['submit'])) {
            $registered = $this->app->getAuth()->register($formData['username'], $formData['email'],
                $formData['name'], $formData['surname'], $formData['password']);
            if ($registered) {
                return $this->redirect('?');
            }
        }
        $data = ($registered === false ? ['message' => 'This account is already registered!', 'form' => $formData] : []);
        return $this->html($data);
    }
}