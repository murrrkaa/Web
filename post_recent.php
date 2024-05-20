<div class="main__recent-post">
    <div class="main__image__box">
        <img src="<?= $post['image_url'] ?>" alt="<?= $post['post_alt'] ?>" />
    </div>
    <div class="main__titles-box">
        <h3 class="main__recent-title"><?= $post['title'] ?></h3>
        <a class="main__recent-subtitle" title='<?= $post['title'] ?>' href='/post?id=<?= $post['post_id'] ?>'>
            <?= $post['subtitle'] ?>
        </a>
    </div>
    <div class="main__user-inner">
        <div class="main__user-box">
            <div class="main__recent-inner-post">
                <div class="main__author-box">
                    <img src="<?= $post['author_url'] ?>" alt="<?= $post['author'] ?>" />
                </div>
                <div class="main__name"><?= $post['author'] ?></div>
            </div>
            <div class="main__date">
                <?php
                    echo date("d/m/Y", $post['publish_date'])
                ?>
            </div>
        </div>
    </div>
</div>