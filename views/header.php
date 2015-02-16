<!DOCTYPE html>

<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <?php if (isset($title)): ?>
        <title>Three Aces | <?= htmlspecialchars($title) ?></title>
    <?php else: ?>
        <title>Three Aces</title>
    <?php endif ?>
  </head>
  <body>
    <header class="header" role="banner">
      <h1 class="site-title">Three Aces</h1>
      <a href="cart.php">Shopping Cart</a>
    </header>
    <?php render_nav() ?>
