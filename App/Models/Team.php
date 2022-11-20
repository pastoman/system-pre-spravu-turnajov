<?php

namespace App\Models;

use App\Core\Model;

class Team extends Model
{
    public $id;
    public $name;
    public $date_created;
    public $owner_id;
    public $no_champ;
    public $no_races;
    public $best_pos;
    public $avg_pos;
    public $no_members;
    public $members;
}