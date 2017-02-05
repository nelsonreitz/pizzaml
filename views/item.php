<div class="item">
  <img class="item-photo" src="/img/pizza_icon.png" alt="<?= $item->name ?> photo">

  <div class="item-infos">
    <h2 class="item-name"><?= $item->name ?></h2>

    <?php if (isset($item->description)): ?>
        <p class="item-description"><?= $item->description ?></p>
    <?php endif ?>

    <form class="order-form" action="/order.php" method="post">

      <input type="hidden" name="cat" value="<?= $_GET['cat'] ?>" />
      <input type="hidden" name="item" value="<?= $item->name ?>" />

      <ul class="item-prices">

        <?php if (isset($item->price[0]['size'])): ?>

          <?php foreach ($item->price as $price): ?>

            <li class="item-price">
              <?php if ($price['size'] == "large"): ?>
                <input id="<?= $item->name . $price['size'] . 'radio' ?>" type="radio" name="size" value="<?= $price['size'] ?>" checked>
              <?php else: ?>
                <input id="<?= $item->name . $price['size'] . 'radio' ?>" type="radio" name="size" value="<?= $price['size'] ?>">
              <?php endif ?>

              <label for="<?= $item->name . $price['size'] . 'radio' ?>"><?= $price['size'] ?>: <span class="sizeprice">$<?= $price ?></span></label>
            </li>

            <input type="hidden" name="<?= $price['size'] ?>" value="<?= $price ?>" />

          <?php endforeach ?>

        <?php else: ?>

            <li class="item-price">$<?= $item->price ?></li>

            <input type="hidden" name="price" value="<?= $item->price ?>" />

        <?php endif ?>

      </ul>

      <div class="order-submit">
        <input class="order-quantity" type="number" name="quantity" value="1" min="1" max="<?= MAX_QUANT ?>" />
        <input class="primary button" type="submit" value="Order">
      </div><!-- .order-submit -->

    </form>

  </div><!-- .item-infos -->
</div><!-- .item -->
