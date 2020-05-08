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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
} else {
    redirect_to(ORDER_URL);
}

$db = get_db_connect();
$items = get_order_data($db, $order_id);


include_once VIEW_PATH . 'order_detail_view.php';
