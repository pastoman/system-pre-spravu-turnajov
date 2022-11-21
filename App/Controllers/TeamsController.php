<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\DB\Connection;
use App\Core\Model;
use App\Core\Responses\Response;
use App\Models\Team;
use App\Models\User;
use Cassandra\Date;
use PDO;

class TeamsController extends AControllerBase
{

    public function index(): Response
    {
        $teams = Team::getAll();
        foreach ($teams as $team) {
            $members = User::getAll("team=$team->id");
            $team->no_members = count($members);
            $team->members = $members;
        }

        return $this->html(['teams' => $teams]);
    }

    public function register(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $registered = null;
        if (isset($formData['submit']) && $this->app->getAuth()->isLogged() && strlen($formPost['team-name']) > 0) {
            $teamName = $formData["team-name"];
            if (count(Team::getAll("name = '$teamName'")) > 0) {
                $registered = false;
            } else {
                $id = $this->app->getAuth()->getLoggedUserId();
                $team = new Team();
                $team->name = $teamName;
                $team->date_created = date("Y-m-d");
                $team->owner_id = $id;
                $team->save();
                $conn = Connection::connect();
                $sql = "UPDATE users SET team=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$team->id, $id]);
                return $this->redirect('?c=teams');
            }
        }
        $data = ($registered === false ? ['message' => 'Unable to register team!'] : []);
        return $this->html($data);
    }

    public function join(): Response
    {
        $user = User::getOne($this->app->getAuth()->getLoggedUserId());
        $getData = $this->app->getRequest()->getGet();
        $user->team = $getData['team'];
        $user->save();
        return $this->redirect("?c=teams");
    }

    public function delete(): Response
    {
        $user = $this->app->getAuth()->getLoggedUserContext();
        $team = Team::getOne($user->team);
        $members = User::getAll("team = $team->id");
        foreach ($members as $member) {
            $member->team = null;
            $member->save();
        }
        $team->delete();
        return $this->redirect("?c=teams");
    }

    public function leave(): Response
    {
        $user = User::getOne($this->app->getAuth()->getLoggedUserId());
        $user->team = null;
        $user->save();
        return $this->redirect("?c=teams");
    }

    public function edit(): Response
    {
        $team = Team::getOne($this->app->getAuth()->getLoggedUserContext()->team);
        $formPost = $this->app->getRequest()->getPost();
        if (isset($formPost['submit']) && strlen($formPost['team-name']) > 0) {
            $team->name = $formPost['team-name'];
            $team->save();
            return $this->redirect('?c=teams');
        }
        return $this->html(['team'=>$team->name]);
    }
}
