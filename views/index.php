<div class="featured-item">
  <a href="#"><img class="featured-item-photo" src="img/featured_item_photo.png" alt="Featured Item photo"></a>
  <div class="item">

    <div class="item-infos">
      <h2 class="item-name"><a href="#">Featured Item</a></h2>
      <p class="item-description">Featured Item description</p>
      <ul class="item-prices">

        <li class="item-price">small : <span class="sizeprice">$6.60</span></li>
        <li class="item-price">large : <span class="sizeprice">$9.85</span></li>

      </ul>

      <form class="order-form" action="" method="">

        <select class="order-size" name="size">
          <option value="">small</option>
          <option value="">large</option>
        </select>

        <input class="order-quantity" type="number" name="quantity" value="1" min="1" max="<?= MAX_QUANT ?>" />
        <button type="button">Order</button>

      </form>
    </div><!-- .item-infos -->
  </div><!-- .item -->
</div><!-- .featured-item -->
