<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/src/styles/fonts.css" />
    <link rel="stylesheet" href="/src/styles/reset.css" />
    <link rel="stylesheet" href="/src/styles/style-post1.css" />
    <title>Blog</title>
  </head>
  <body>
  <?php 
    require "db.php";
    $connection = createDBConnection();
    $postId = $_GET['id'];
    if (is_numeric($postId)){
      $sql_query = "SELECT * FROM post WHERE post_id = " . $postId;
      $result = mysqli_query($connection, $sql_query);
      if (mysqli_num_rows($result) > 0) {
        $get_post = mysqli_fetch_assoc($result);
      } else {
        header("Location: /home");
        exit();
      }
    } else {
        header("Location: /home");
        exit();
      }
    closeDBConnection($connection);                  
  ?>
  <?php
      $post = [
        'id' => 1,
        'title' => 'The Road Ahead',
        'subtitle' => 'The road ahead might be paved - it might not be.',
        'img_modifier' => '/src/images/lights.jpg',
        'logo_header' => '/src/images/logo-header.svg',
        'logo_footer' => '/src/images/logo-footer.svg',
        'post_text' => 'Dark spruce forest frowned on either side the frozen
      waterway. The trees had been stripped by a recent wind
      of their white covering of frost, and they seemed to
      lean towards each other, black and ominous, in the
      fading light. A vast silence reigned over the land. The
      land itself was a desolation, lifeless, without
      movement, so lone and cold that the spirit of it was not
      even that of sadness. There was a hint in it of
      laughter, but of a laughter more terrible than any
      sadness—a laughter that was mirthless as the smile of
      the sphinx, a laughter cold as the frost and partaking
      of the grimness of infallibility. It was the masterful
      and incommunicable wisdom of eternity laughing at the
      futility of life and the effort of life. It was the
      Wild, the savage, frozen-hearted Northland Wild. <br />
      <br />
      But there was life, abroad in the land and defiant. Down
      the frozen waterway toiled a string of wolfish dogs.
      Their bristly fur was rimed with frost. Their breath
      froze in the air as it left their mouths, spouting forth
      in spumes of vapour that settled upon the hair of their
      bodies and formed into crystals of frost. Leather
      harness was on the dogs, and leather traces attached
      them to a sled which dragged along behind. The sled was
      without runners. It was made of stout birch-bark, and
      its full surface rested on the snow. The front end of
      the sled was turned up, like a scroll, in order to force
      down and under the bore of soft snow that surged like a
      wave before it. On the sled, securely lashed, was a long
      and narrow oblong box. <br /><br />
      There were other things on the sled—blankets, an axe,
      and a coffee-pot and frying-pan; but prominent,
      occupying most of the space, was the long and narrow
      oblong box. In advance of the dogs, on wide snowshoes,
      toiled a man. At the rear of the sled toiled a second
      man. On the sled, in the box, lay a third man whose toil
      was over, - a man whom the Wild had conquered and beaten
      down until he would never move nor struggle again. It is
      not the way of the Wild to like movement. Life is an
      offence to it, for life is movement; and the Wild aims
      always to destroy movement. It freezes the water to
      prevent it running to the sea; it drives the sap out of
      the trees till they are frozen to their mighty hearts;
      and most ferociously and terribly of all does the Wild
      harry and crush into submission man—man who is the most
      restless of life, ever in revolt against the dictum that
      all movement must in the end come to the cessation of
      movement. <br /><br />
      But at front and rear, unawed and indomitable, toiled
      the two men who were not yet dead. Their bodies were
      covered with fur and soft-tanned leather. Eyelashes and
      cheeks and lips were so coated with the crystals from
      their frozen breath that their faces were not
      discernible. This gave them the seeming of ghostly
      masques, undertakers in a spectral world at the funeral
      of some ghost. But under it all they were men,
      penetrating the land of desolation and mockery and
      silence, puny adventurers bent on colossal adventure,
      pitting themselves against the might of a world as
      remote and alien and pulse less as the abysses of space.',
        'logo' => 'Logo',
        'road' => 'Nothern lights'
    ]?>
    <div class="wrapper">
    <div class="overlay"></div>
      <header class="header">
        <div class="container">
          <div class="header__top-inner">
            <a class="header__logo logo" href="home">
              <img src="<?= $post['logo_header'] ?>" alt="<?= $post['logo'] ?>" />
            </a>
            <a class="header__menu" href="#">
                <span></span>
              </a>
            <div class="header__nav-box navs">
              <ul class="header__nav-list list">
              <li class="header__nav-item nav">
                  <a href="home">Home</a>
                </li>
                <li class="header__nav-item nav">
                  <a href="#">Categories</a>
                </li>
                <li class="header__nav-item nav">
                  <a href="#">About</a>
                </li>
                <li class="header__nav-item nav">
                  <a href="#">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header>
      <main>
          <section class="road">
            <div class="container">
              <div class="road__inner">
                <div class="road__content">
                  <div class="road__titles">
                    <h1 class="road__title">
                      <?= $get_post['title'] ?>
                    </h1>
                    <h2 class="road__subtitle">
                     <?= $get_post['subtitle'] ?>
                    </h2>
                  </div>
                  <div class="image__box">
                    <img class="road__image" src="<?= $get_post['image_url'] ?>" alt="<?= $get_post['post_alt'] ?>" />
                  </div>
                  <div class="road__text">
                    <div class="road__text-inner">
                      <div class="road__container-text">
                        <p>
                        <?= $get_post['content'] ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
      </main>
      <footer class="footer">
        <div class="footer__container">
        <div class="footer__image">
              <img src="/src/images/footer__image.jpg" alt="Footer">
            </div>
        <div class="footer__form">
          <div class="footer__title-box">
              <h2 class="footer__title">Stay in Touch</h2>
              <div class="footer__line"></div>
            </div>
            <form class="form">
              <input class="form__text" type="text" placeholder="Enter your email address">
              <button class="form__button" type="submit">Submit</button>
            </form>
          </div>
          <div class="footer__top-inner">
            <a class="footer-logo logo" href="home">
              <img src="<?= $post['logo_footer'] ?>" alt="<?= $post['logo'] ?>" />
            </a>
            <div class="footer__navs-box navs">
              <ul class="footer__nav-list list">
                <li class="footer__nav-item nav">
                  <a href="home">Home</a>
                </li>
                <li class="footer__nav-item nav">
                  <a href="#">Categories</a>
                </li>
                <li class="footer__nav-item nav">
                  <a href="#">About</a>
                </li>
                <li class="footer__nav-item nav">
                  <a href="#">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script src="/src/js/home.js"></script>
  </body>
</html>
