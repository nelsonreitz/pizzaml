<!DOCTYPE html>

<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if (isset($title)): ?>
        <title>Three Aces | <?= htmlspecialchars($title) ?></title>
    <?php else: ?>
        <title>Three Aces</title>
    <?php endif ?>

    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/style.css">

  </head>
  <body>

    <header class="header" role="banner">
      <h1 class="site-title"><a href="/">Three Aces</a></h1>
      <a href="/cart.php">Shopping Cart</a>
    </header>

    <div class="container">
      <?php render_nav() ?>
