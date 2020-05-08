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
                    <th>注文番号</th>
                    <th>合計金額</th>
                    <th>購入日時</th>
                    <td>購入明細表示</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) { ?>
                <tr
                    class="<?php print(is_open($item) ? '' : 'close_item'); ?>">
                    <td><?php print($item['id']); ?>
                    </td>
                    <td><?php print(number_format($item['total_price'])); ?>円
                    </td>
                    <td><?php print($item['created']); ?>
                    </td>
                    <td>
                        <form method="post" action="order_detail.php" class="operation">
                            <input type="submit" value="明細へ" class="btn btn-secondary">
                            <input type="hidden" name="order_id"
                                value="<?php print($item['id']); ?>">
                        </form>
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