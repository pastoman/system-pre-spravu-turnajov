<?php

namespace App\Config;

use App\Auth\Auth;

/**
 * Class Configuration
 * Main configuration for the application
 * @package App\Config
 */
class Configuration
{
    public const APP_NAME = 'Championship management';
    public const FW_VERSION = '2.0';

    public const DB_HOST = 'localhost';  // change to db, if docker you use docker
    public const DB_NAME = 'vaiicko_db';
    public const DB_USER = 'root'; // change to vaiicko_user, if docker you use docker
    public const DB_PASS = 'dtb456';

    public const LOGIN_URL = '?c=auth&a=login';
    public const REGISTER_URL = '?c=auth&a=register';

    public const ROOT_LAYOUT = 'root';

    public const DEBUG_QUERY = false;

    public const AUTH_CLASS = Auth::class;
}