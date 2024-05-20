<div class="main__featured-post">
  <div class="main__featured-img">
    <img src="<?= $post['image_url'] ?>" alt="<?= $post['post_alt'] ?>" />   
  </div>
  <div class="main__featured-content">
  <h2 class="main__featured-title"><?= $post['title'] ?></h2>
    <?php
      if ($post['title'] === 'From Top Down'){
        echo '<a href="#"><div class="main__featured-button button">Advanture</div></a>';
      }
    ?>
    <a class="main__featured-subtitle" title="<?= $post['title'] ?>" href="/post?id=<?= $post['post_id'] ?>">
      <?= $post['subtitle'] ?>
    </a>
      <div class="main__featured-info">
        <div class="main__featured-inner-info">
          <div class="main__featured-photo">
            <img src="<?= $post['author_url'] ?>" alt="<?= $post['author'] ?>" />
          </div>
        <div class="main__featured-name"><?= $post['author'] ?></div>
      </div>
      <div class="main__featured-date">
        <?php
          echo (date("F d, Y", $post['publish_date']));
        ?>
      </div>
    </div>
  </div>
</div>