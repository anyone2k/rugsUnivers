<?php

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';

App::load();


if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}


// Authentication
// $app = App::getInstance();
// $auth = new DBAuth(App::getInstance()->getDb());
// if (!$auth->logged()) {
//     $app->forbidden();
// }
ob_start();
if ($page === 'home') {
    require ROOT . '/app/views/templates/home.php';
} elseif ($page === 'login') {
    require ROOT . '/app/views/users/login.php';
} elseif ($page === 'register') {
    require ROOT . '/app/views/users/register.php';
}


$content = ob_get_clean();

require ROOT . '/app/views/templates/default.php';

