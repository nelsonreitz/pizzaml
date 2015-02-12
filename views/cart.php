<p>This is the shopping cart view.</p>

<form method="post" action="cart.php">
  <table>
    <thead>
      <tr>
        <th>Category</th>
        <th>Item</th>
        <th>Size</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['orders'] as $id => $order): ?>

          <tr>
            <td><?= $order['cat'] ?></td>
            <td><?= $order['item'] ?></td>
            <td>
              <?php
                  echo (isset($order['size'])) ? $order['size'] : '';
              ?>
            </td>
            <td><input type="number" name="<?= $id ?>" value="<?= $order['quantity'] ?>" min="0" max="<?= MAX_QUANT ?>" /></td>
            <td><?= number_format($order['price'] * $order['quantity'], 2) ?></td>
            <td>
              <input type="checkbox" name="id[]" value="<?= $id ?>" />
            </td>
          </tr>

      <?php endforeach ?>
      <tr>
        <td>TOTAL</td>
        <td><?= number_format(total(), 2) ?></td>
      </tr>
    </tbody>
  </table>

  <button type="submit">Update cart</button>
</form>
