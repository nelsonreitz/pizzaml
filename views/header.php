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

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="icon" type="image/png" href="../img/favicon.png">

  </head>
  <body>

    <header class="header" role="banner">
      <div class="container">
        <h1 class="site-title"><a href="/">Three Aces</a></h1>
        <a class="cartlink" href="/cart.php">Shopping Cart</a>
      </div><!-- .container -->
    </header>

    <div class="container">
      <div class="row">

        <?php (isset($title)) ? render_nav($title) : render_nav() ?>

        <div class="content nine columns">
