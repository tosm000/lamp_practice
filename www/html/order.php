<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'order.php';

session_start();

if (is_logined() === false) {
    redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

if (is_admin($user) === false) {
    $items = get_orders_data($db, $user['user_id']);
} else {
    $items = get_orders_data_by_admin($db);
}


include_once VIEW_PATH . 'orders_view.php';
