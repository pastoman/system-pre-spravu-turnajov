<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use App\Core\Model;
use App\Models\User;

/**
 * Class Auth
 * Basic implementation of user authentication
 * @package App\Auth
 */
class Auth implements IAuthenticator
{
    /**
     * Auth constructor
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */

    function generatePassHash($password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    function login($login, $password): bool
    {
        $users =  User::getAll();
        foreach ($users as $user) {
            if ($login == $user->username && password_verify($password, $user->hash)) {
                $_SESSION['user'] = $user->username;
                return true;
            }
        }
        return false;
    }

    /**
     * Logout the user
     */
    function logout() : void
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            session_destroy();
        }
    }

    /**
     * Get the name of the logged-in user
     * @return string
     */
    function getLoggedUserName(): string
    {

        return isset($_SESSION['user']) ? $_SESSION['user'] : throw new \Exception("User not logged in");
    }

    /**
     * Get the context of the logged-in user
     * @return string
     */
    function getLoggedUserContext(): mixed
    {
        return null;
    }

    /**
     * Return if the user is authenticated or not
     * @return bool
     */
    function isLogged(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }

    /**
     * Return the id of the logged-in user
     * @return mixed
     */
    function getLoggedUserId(): mixed
    {
        return $_SESSION['user'];
    }


}