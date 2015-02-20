<div class="item">
  <img class="item-photo" src="/img/pizza_icon.png" alt="<?= $item->name ?> photo">

  <div class="item-infos">
    <h2 class="item-name"><?= $item->name ?></h2>

    <?php if (isset($item->description)): ?>
        <p class="item-description"><?= $item->description ?></p>
    <?php endif ?>

    <ul class="item-prices">

      <?php foreach ($item->price as $price): ?>

          <?php if (isset($price['size'])): ?>
              <li class="item-price"><?= $price['size'] ?> : <span class="sizeprice">$<?= $price ?></span></li>
          <?php else: ?>
              <li class="item-price">$<?= $price ?></li>
          <?php endif ?>

      <?php endforeach ?>

    </ul>

    <?php render('order_form', ['item' => $item]) ?>

  </div><!-- .item-infos -->
</div><!-- .item -->
