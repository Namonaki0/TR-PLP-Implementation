<div class="product-container">
    <div class="img-wrapper">
        <img src="img/{{img}}.jpg" alt="{{name}}" />
    </div>
    <h4 class="product-name">{{name}}</h4>
    <p class="product-price">£{{price}}</p>

    <?php if (isset($product['was_price']) && $product['was_price'] !== false) : ?>
    <p class="product-saving" aria-label="Price Savings">Was <span class="saving-amount">£{{was_price}}</span></p>
    <?php else : ?>
    <p class="product-saving" aria-label="hidden"></p>
    <?php endif; ?>

    <?php if (isset($product['reviews']) && $product['reviews'] !== false) : ?>
    <span class="review-score">{{reviews}}% Review Score</span>
    <?php endif; ?>

    <button class="add-to-basket-btn">Add To Basket</button>
</div>