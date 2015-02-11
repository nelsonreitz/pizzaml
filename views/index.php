<ul>
  <?php foreach ($categories as $category): ?>

      <li><a href="category/<?= $category->title ?>"><?= $category->title ?></a></li> 

  <?php endforeach ?>
</ul>

<a href="cart.php">Shopping Cart</a>
