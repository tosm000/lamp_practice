<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_orders_data($db, $user_id)
{
    $sql ="
        SELECT *
        FROM
          orders
        WHERE
          user_id = {$user_id}
        ORDER BY 
            id DESC
        ";
    return fetch_all_query($db, $sql);
}

function get_orders_data_by_admin($db)
{
    $sql ="
        SELECT *
        FROM
          orders
        ORDER BY 
            id DESC
        ";
    return fetch_all_query($db, $sql);
}

function get_order_data($db, $order_id)
{
    $sql ="
        SELECT 
            order_detail.amount as amount,
            order_detail.price as price,
            items.name
        FROM
          order_detail
        JOIN
            items
        ON
            order_detail.item_id = items.item_id
        WHERE
            order_detail.order_id = {$order_id}
        ";

    return fetch_all_query($db, $sql);
}
