<div class="featured-item">

  <a href="#"><img class="featured-item-photo" src="img/featured_item_photo.png" alt="Featured Item photo"></a>

  <div class="item">

    <div class="item-infos">
      <h2 class="item-name">Featured Item</h2>
      <p class="item-description">Featured Item description</p>

      <form class="order-form" action="#" method="">

      	<ul class="item-prices">

      	  <li class="item-price">
      	  	<input id="Featureditemsmallradio" name="size" type="radio" value="small">
      	  	<label for="Featureditemsmallradio">
      	  	  small: <span class="sizeprice">$9.90</span>
      	  	</label>
      	  </li>

      	  <li class="item-price">
      	  	<input id="Featureditemlargeradio" name="size" type="radio" value="large" checked>
      	  	<label for="Featureditemlargeradio">
      	  	  large: <span class="sizeprice">$14.90</span>
      	  	</label>
      	  </li>

      	</ul>

      	<div class="order-submit">
	      <input class="order-quantity" name="quantity" type="number" value="1" min="1" max="<?= MAX_QUANT ?>">
	      <input class="primary button" type="submit" value="Order">
      	</div><!-- .order-submit -->

      </form>

    </div><!-- .item-infos -->
    
  </div><!-- .item -->

</div><!-- .featured-item -->
