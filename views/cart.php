<h2>Shopping Cart</h2>

<form class="cart" method="post" action="cart.php">
  <table>

    <thead>
      <tr>
        <th>Category</th>
        <th>Item</th>
        <th>Size</th>
        <th>Quantity</th>
        <th class="cart-price">Price</th>
        <th class="cart-remove">Remove</th>
      </tr>
    </thead>

    <tbody>

      <?php foreach ($_SESSION['orders'] as $id => $order): ?>

          <tr>
            <td><?= $order['cat'] ?></td>
            <td><?= $order['item'] ?></td>
            <td class="cart-size"><?= (isset($order['size'])) ? $order['size'] : '' ?></td>
            <td><input type="number" name="<?= $id ?>_qty" value="<?= $order['quantity'] ?>" min="1" max="<?= MAX_QUANT ?>"></td>
            <td class="cart-price"><?= number_format($order['price'] * $order['quantity'], 2) ?></td>
            <td class="cart-remove"><input type="checkbox" name="remove[]" value="<?= $id ?>"></td>
          </tr>

      <?php endforeach ?>

      <tr class="cart-total">
        <td colspan="4">TOTAL</td>
        <td class="cart-price"><?= number_format(total(), 2) ?></td>
        <td></td>
      </tr>
    </tbody>

  </table>

  <div class="cart-submits">
    <input type="submit" name="update" value="Update Cart">
    <input type="submit" name="checkout" value="Check Out">
  </div>

</form>
