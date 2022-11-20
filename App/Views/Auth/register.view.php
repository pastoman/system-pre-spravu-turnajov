<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Registration</h5>
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-register" method="post" action="<?= \App\Config\Configuration::REGISTER_URL ?>">
                        <div class="form-label-group mb-3">
                            <label for="login-register" class="form-label">Username</label>
                            <input name="username" type="text" id="login-register" class="form-control" required
                                   autofocus>
                        </div>
                        <div class="form-label-group mb-3">
                            <label for="email-register" class="form-label">Email</label>
                            <input name="email" type="email" id="email-register" class="form-control"
                                   aria-describedby="emailHelpBlock" required>
                            <div id="emailHelpBlock" class="form-text">
                            </div>
                        </div>
                        <div class="form-label-group mb-3">
                            <label for="password-register" class="form-label">Password</label>
                            <input name="password" type="password" id="password-register" class="form-control"
                                   aria-describedby="passwordHelpBlock" required>
                            <div id="passwordHelpBlock" class="form-text">
                                Your password must be 6-30 characters long and must contain at least one uppercase
                                letter, at least one lowercase letter and at lest one number, and must not contain spaces.
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit" id="submit-register">Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
