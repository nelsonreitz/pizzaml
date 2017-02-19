<h2>Shopping Cart</h2>

<form class="cart" method="post" action="cart.php">
  <table>

    <thead>
      <tr>
        <th>Item</th>
        <th class="cart-size">Size</th>
        <th class="cart-quantity">Quantity</th>
        <th class="cart-price">Price</th>
        <th class="cart-remove">Remove</th>
      </tr>
    </thead>

    <tbody>

      <?php foreach ($_SESSION['orders'] as $id => $order): ?>

          <tr>
            <td>
              <img class="item-photo" src="/img/pizza_icon.png" alt="<?= $order['item'] ?> photo">
              <p class="item-name"><?= $order['item'] ?></p>
            </td>
            <td class="cart-size">
              <span class="item-size"><?= (isset($order['size'])) ? $order['size'] : '' ?></span>
            </td>
            <td><input type="number" name="<?= $id ?>_qty" value="<?= $order['quantity'] ?>" min="1" max="<?= MAX_QUANT ?>"></td>
            <td class="cart-price"><?= number_format($order['price'] * $order['quantity'], 2) ?></td>
            <td class="cart-remove"><input type="checkbox" name="remove[]" value="<?= $id ?>"></td>
          </tr>

      <?php endforeach ?>

      <tr class="cart-total">
        <td colspan="3">TOTAL</td>
        <td class="cart-price">$<?= number_format(total(), 2) ?></td>
        <td></td>
      </tr>
    </tbody>

  </table>

  <div class="cart-submits">
    <input class="button secondary" type="submit" name="update" value="Update Cart">
    <input class="button primary" type="submit" name="checkout" value="Check Out">
  </div>

</form>
