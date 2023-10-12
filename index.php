<?php
require_once "data/database.php";
require_once "components/productTemplate.php";

function displayProducts()
{
  $servername = "localhost:3307";
  $username = "root";
  $password = "";
  $dbname = "product";

  $connection = new DatabaseConnection($servername, $username, $password, $dbname);
  $conn = $connection->connect();

  if ($conn) {
    $products = $connection->fetchProducts();

    if ($products) {
      renderProduct($products);
    } else {
      echo "Error fetching products.";
    }

    $connection->close();
  } else {
    echo "Connection failed!";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    <?php include 'css/styles.css';
    ?>
    </style>

    <meta name="description"
        content="Explore a collection of essential products including furniture, home appliances, photo albums, and more. Always with great prices.">
    <title>TR-PLP</title>
</head>

<body>
    <main>
        <h3 class="product-title">Office Essentials</h3>
        <?php include 'components/sortBy.php'; ?>

        <div class="product-listing" id="productListing">
            <?php displayProducts(); ?>
        </div>
    </main>

    <script src="filters/productSortByFilter.js"></script>
</body>

</html>