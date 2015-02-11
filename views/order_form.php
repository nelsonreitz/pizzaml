<form action="/order.php" method="post" >
  <input type="hidden" name="cat" value="<?= $_GET['cat'] ?>" />
  <input type="hidden" name="item" value="<?= $item->name ?>" />

  <?php if (isset($item->price[0]['size'])): ?>
      <select name="size">

        <?php foreach ($item->price as $price): ?>
            <option value="<?= $price['size'] ?>"><?= $price['size'] ?></option>
        <?php endforeach ?>

      </select>

      <?php foreach ($item->price as $price): ?>
          <input type="hidden" name="<?= $price['size'] ?>" value="<?= $price ?>" />
      <?php endforeach ?>

  <?php else: ?>
      <input type="hidden" name="price" value="<?= $item->price ?>" />
  <?php endif ?>

  <input type="number" name="quantity" value="1" min="1" max="100" />
  <button type="submit">Order</button>
</form>
