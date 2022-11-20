<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/public/css/styl.css">
    <script src="/public/js/script.js"></script>
</head>
<body>
<div id="navbar">
    <nav>
        <input type="checkbox" id="nav"><label for="nav"></label>
        <ul>
            <li><a href="?">Championships</a></li>
            <li><a href="?c=teams">Teams</a></li>
            <li><a href="?c=rules">Rules</a></li>
            <li><a href="">About</a></li>
            <li class="account">
                <ul>
                    <?php if (!$auth->isLogged()) { ?>
                        <li><a href="?c=auth">Log in</a></li>
                        <li><a href="?c=auth&a=register">Register</a></li>
                    <?php } else { ?>
                        <li><a href="?c=auth&a=logout">Log out</a></li>
                        <li>
                            <svg>
                                <mask id="svgmaskcircle">
                                    <circle fill="#ffffff" cx="35" cy="35" r="35"></circle>
                                </mask>
                                <a href="#">
                                    <image width="70" height="70" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/public/images/Portrait_Placeholder.png" mask="url(#svgmaskcircle)"></image>
                                </a>
                            </svg>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<div class="web-content">
    <?= $contentHTML ?>
</div>
</body>
</html>
