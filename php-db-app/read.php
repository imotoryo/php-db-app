<?php
$dsn = 'mysql:dbname=php_db_app;fost=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';

try {
  $pdo = new PDO($dsn, $user, $password);
  $sql_select = 'SELECT * FROM products';
  $stmt_select = $pdo->query($sql_select);
  $products = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  exit($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品一覧</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/destyle.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <nav>
      <a href="index.php">商品管理アプリ</a>
    </nav>
  </header>
  <main>
    <article class="products">
      <h1>商品一覧</h1>
      <div class="products-ui">

      </div>
      <table class="products-table">
        <tr>
          <th>商品コード</th>
          <th>商品名</th>
          <th>単価</th>
          <th>在庫数</th>
          <th>仕入先コード</th>
        </tr>
        <?php
        //ここから先のコードの間違いが分かりません。
        foreach ($products as $product) {
          $table_row = "
              <tr>
              <tb>{$product['product_code']}</tb>
              <tb>{$product['product_name']}</tb>
              <tb>{$product['price']}</tb>
              <tb>{$product['stock_quantity']}</tb>
              <tb>{$product['vendor_code']}</tb>
              </tr>
          ";
          echo $table_row;
        }
        ?>
      </table>
    </article>
  </main>
  <footer>
    <p class="copyright">&copy;商品管理アプリ All rights reserved.
    </p>
  </footer>
</body>

</html>