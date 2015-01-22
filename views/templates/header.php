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
    <?php if (isset($title)): ?>
        <h1><?= htmlspecialchars($title) ?></h1>
    <?php endif ?>
