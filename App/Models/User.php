<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public $id;
    public $username;
    public $email;
    public $hash;
}