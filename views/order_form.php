<form action="order.php" method="post" >
  <input type="number" name="quantity" value="1" min="1" max="100" />
  
  <?php if (isset($item->price[0]['size'])): ?>
      <select name="size">
      
        <?php foreach ($item->price as $price): ?>
            <option value="<?= $price['size'] ?>"><?= $price['size'] ?></option>
        <?php endforeach ?>
        
      </select>
  <?php endif ?>
  
  <button type="submit">Order</button>
</form>
