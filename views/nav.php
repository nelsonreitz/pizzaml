<nav class="navigation three columns" role="navigation">
  <ul>

    <?php foreach ($categories as $category): ?>

        <li class="menu-item<?= ($title == $category->title) ? ' current-cat' : '' ?>">
          <a href="<?= $category->url ?>"><?= $category->title ?></a>
        </li>

    <?php endforeach ?>

  </ul>
</nav>
