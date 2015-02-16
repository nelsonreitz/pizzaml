<nav class="navigation" role="navigation">
  <ul>
    <?php foreach ($categories as $category): ?>

        <li class="menu-item"><a href="<?= $category->url ?>"><?= $category->title ?></a></li>

    <?php endforeach ?>
  </ul>
</nav>
