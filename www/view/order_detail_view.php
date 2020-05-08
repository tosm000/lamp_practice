<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <title>商品管理</title>
    <link rel="stylesheet"
        href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>

<body>
    <?php
  include VIEW_PATH . 'templates/header_logined.php';
  ?>

    <div class="container">
        <h1>商品管理</h1>

        <?php include VIEW_PATH . 'templates/messages.php'; ?>
        <?php if (count($items) > 0) { ?>
        <table class="table table-bordered text-center">
            <thead class="thead-light">
                <tr>
                    <th>商品名</th>
                    <th>商品価格</th>
                    <th>購入数</th>
                    <td>小計</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) { ?>
                <tr
                    class="<?php print(is_open($item) ? '' : 'close_item'); ?>">
                    <td><?php print($item['name']); ?>
                    </td>
                    <td><?php print(number_format($item['price'])); ?>円
                    </td>
                    <td><?php print($item['amount']); ?>
                    </td>
                    <td><?php print(number_format((int)$item['price'] * (int)$item['amount'])); ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <p>商品はありません。</p>
        <?php } ?>
    </div>
    <script>
        $('.delete').on('click', () => confirm('本当に削除しますか？'))
    </script>
</body>

</html>