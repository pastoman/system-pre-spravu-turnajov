<?php
/** @var Array $data */
/** @var Team $team */
/** @var User $member */
/** @var IAuthenticator $auth */

use App\Core\IAuthenticator;
use App\Models\Team;
use App\Models\User;

?>
<div class="teams">
    <?php if($auth->isLogged() && $auth->getLoggedUserContext()->team == null) { ?>
    <a class="button button-team" href="/?c=teams&a=register">Register team</a>
    <?php } ?>
    <table class="teams_table">
        <tr>
            <th>Team name</th>
            <th>Date created</th>
            <th>Finished championships</th>
            <th>Finished races</th>
            <th>Best position</th>
            <th>Average position</th>
            <th>Number of drivers</th>
            <th>Drivers</th>
            <?php if($auth->isLogged()) { ?>
            <th></th>
            <?php } ?>
        </tr>
        <?php foreach ($data['teams'] as $team) {?>
        <tr>
            <td><?= $team->name ?></td>
            <td><?= $team->date_created ?></td>
            <td><?= $team->no_champ ?></td>
            <td><?= $team->no_races ?></td>
            <td><?= $team->best_pos ?></td>
            <td><?= $team->avg_pos ?></td>
            <td><?= $team->no_members ?></td>
            <td>
                <ul>
                    <?php foreach ($team->members as $member) { ?>
                        <li><?= $member->name." ".$member->surname ?></li>
                    <?php } ?>
                </ul>
            </td>
            <?php if($auth->isLogged()) { ?>
            <td>
                <?php if ($team->owner_id == $auth->getLoggedUserId() &&
                    $team->id == $auth->getLoggedUserContext()->team) { ?>
                    <a class="button button-team button-small" href="?c=teams&a=delete">Delete</a>
                    <a class="button button-team button-small" href="?c=teams&a=edit">Edit</a>
                <?php } elseif ($team->owner_id != $auth->getLoggedUserId() &&
                    $team->id == $auth->getLoggedUserContext()->team) { ?>
                    <a class="button button-team button-small" href="?c=teams&a=leave">Leave</a>
                <?php } elseif ($auth->getLoggedUserContext()->team == null) { ?>
                    <a class="button button-team button-small" href="?c=teams&a=join&team=<?php echo $team->id ?>">Join</a>
                <?php } ?>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
</div>