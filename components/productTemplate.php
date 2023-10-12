<?php
function renderProduct($products)
{
    foreach ($products as $product) {
        echo '<div class="product-container">';
        echo '<div class="img-wrapper">';
        echo '<img src="assets/img/' . $product['img'] . '.jpg" alt="' . htmlspecialchars($product['name']) . '" />';
        echo '</div>';
        echo '<h4 class="product-name">' . htmlspecialchars($product['name']) . '</h4>';
        echo '<p class="product-price">£' . htmlspecialchars($product['price']) . '</p>';

        if (isset($product['was_price']) && $product['was_price'] !== false) {
            echo '<p class="product-saving" aria-label="Price Savings">Was <span class="saving-amount">£' . htmlspecialchars($product['was_price']) . '</span></p>';
        } else {
            echo '<p class="product-saving" aria-hidden="true"></p>';
        }

        if (isset($product['reviews']) && $product['reviews'] !== false) {
            echo '<p class="review-score">' . htmlspecialchars($product['reviews']) . '% Review Score</p>';
        } else {
            echo '<p class="review-score" aria-hidden="true"></p>';
        }

        echo '<button class="add-to-basket-btn" aria-label="Add To Basket">Add To Basket</button>';
        echo '</div>';
    }
}
