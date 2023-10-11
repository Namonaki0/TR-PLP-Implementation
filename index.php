<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <style>
    <?php include 'styles.css';
    ?>
  </style>

  <meta name="description" content="Explore a collection of essential products including furniture, home appliances, photo albums, and more. Always with great prices.">
  <title>TR-PLP</title>
</head>

<body>
  <main>
    <h3>Office Essentials</h3>
    <button class="sort-by-panel-trigger">Sort by...</button>
    <div class="sort-by-wrapper" id="sortWrapper">
      <button class="sort-by-btn" id="sortByPrice">Sort By Price</button>
      <button class="sort-by-btn" id="sortByReview">Sort By Review</button>
      <button class="sort-by-btn" id="sortByName">Sort By Name</button>
      <button class="sort-by-btn" id="sortBySaving">Sort By Saving</button>
    </div>
    <div class="product-listing" id="productListing">
      <?php
      $jsonData = file_get_contents('data/product.json');
      $data = json_decode($jsonData, true);

      if ($data && isset($data['product_arr'])) {
        $products = $data['product_arr'];

        $template = file_get_contents('productTemplate.php');

        foreach ($products as $product) {
          $html = str_replace(
            ['{{img}}', '{{name}}', '{{price}}', '{{was_price}}', '{{reviews}}'],
            [
              $product['img'],
              $product['name'],
              $product['price'],
              isset($product['was_price']) ? $product['was_price'] : '',
              isset($product['reviews']) ? $product['reviews'] : ''
            ],
            $template
          );

          if (strpos($html, '{{') === false) {
            echo '<div class="product-information" aria-label="Product Information" role="article">' . $html . '</div>';
          }
        }
      } else {
        echo 'No product data available.';
      }
      ?>
    </div>
  </main>

</html>

<script src="productFilter.js"></script>
</body>

</html>