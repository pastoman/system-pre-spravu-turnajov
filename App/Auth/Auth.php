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



    function generatePassHash($password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */
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

    public function register($login, $email, $password): bool
    {
        $users = User::getAll("username = '$login'");
        if (count($users) > 0) {
            return false;
        }
        $dataValid = true;
        $emaiCheck = preg_match('/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/', $email);
        if (!$emaiCheck) {
            $dataValid = false;
        }
        $passCheck = preg_match('/^(?=[^\nA-Z]*[A-Z])(?=[^\na-z]*[a-z])(?=[^\d\n]*\d)\S{6,30}$/', $password);
        if (!$passCheck) {
            $dataValid = false;
        }
        if ($dataValid) {
            $user = new User();
            $user->username = $login;
            $user->email = $email;
            $user->hash = $this->generatePassHash($password);
            $user->save();
            return true;
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
        return $_SESSION['user'] ?? throw new \Exception("User not logged in");
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