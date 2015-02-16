<nav>
  <ul>
    <?php foreach ($categories as $category): ?>

        <li><a href="<?= $category->url ?>"><?= $category->title ?></a></li>

    <?php endforeach ?>
  </ul>
</nav>
