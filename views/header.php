<!DOCTYPE html>

<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if (isset($title)): ?>
        <title>PizzaML | <?= htmlspecialchars($title) ?></title>
    <?php else: ?>
        <title>PizzaML</title>
    <?php endif ?>

    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:300,400,700'>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="icon" type="image/png" href="../img/favicon.png">

    <script src="https://use.fontawesome.com/8a8e52f734.js"></script>

  </head>
  <body>

    <header class="header" role="banner">
      <div class="container">
        <h1 class="site-title"><a href="/">Pizza<span class="ml">ML</span></a></h1>
        <a class="cartlink" href="/cart.php">
          <span class="cartlinklabel">Shopping Cart</span>
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        </a>
      </div><!-- .container -->
    </header>

    <div class="container">
      <div class="row">

        <?php (isset($title)) ? render_nav($title) : render_nav() ?>

        <div class="content nine columns">
