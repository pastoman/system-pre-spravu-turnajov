<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Edit team name</h5>
                    <form class="form-edit" method="post" action="?c=teams&a=edit">
                        <div class="form-label-group mb-3">
                            <label for="team-name-edit" class="form-label">Team Name</label>
                            <input name="team-name" type="text" id="team-name-register" class="form-control"
                                   value="<?=$data['team']?>" required autofocus>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit" id="submit-edit">
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
