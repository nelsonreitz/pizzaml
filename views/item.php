<div class="item">
  <ul>
    <li class="name"><?= $item->name ?></li>

    <?php if (isset($item->description)): ?>
        <li class="description"><?= $item->description ?></li>
    <?php endif ?>

    <?php foreach ($item->price as $price): ?>

        <?php if (isset($price['size'])): ?>
            <li class="price"><?= $price['size'] ?>: $<?= $price ?></li>
        <?php else: ?>
            <li class="price">$<?= $price ?></li>
        <?php endif ?>

    <?php endforeach ?>

  </ul>

  <?php render('order_form', ['item' => $item]) ?>

</div>
