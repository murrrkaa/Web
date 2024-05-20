<?php
    $posts_featured= [
      [
        'id' => 1,
        'title' => 'The Road Ahead',
        'subtitle' => 'The road ahead might be paved - it might not be.',
        'img_modifier' => '/src/images/people1.svg',
        'background' => '/src/images/futuread1.jpg',
        'post' => 'Nother lights',
        'author' => 'Mat Vogels',
        'date' => 1443139200
      ],
      [
        'id' => 2,
        'title' => 'From Top Down',
        'subtitle' => 'Once a year, go someplace you’ve never been before.',
        'background' => '/src/images/futuread2.jpg',
        'img_modifier' => '/src/images/people2.svg',
        'post' => 'Balloons',
        'author' => 'William Wong',
        'date' => 1443139200
      ],
    ];
    $posts_recent = [
      [
        'id' => 3,
        'title' => 'Still Standing Tall',
        'subtitle' => 'Life begins at the end of your comfort zone.',
        'img_modifier' => '/src/images/people2.svg',
        'background' => '/src/images/MostRecent/1.jpg',
        'post' => 'Ballons',
        'author' => 'William Wong',
        'date' => 1443139200
      ],
      [
        'id' => 4,
        'title' => 'Sunny Side Up',
        'subtitle' => 'No place is ever as bad as they tell you it’s <br />
        going to be.',
        'img_modifier' => '/src/images/people1.svg',
        'background' => '/src/images/MostRecent/2.jpg',
        'post' => 'Bridge',
        'author' => 'Mat Vogels',
        'date' => 1443139200
      ],
      [
        'id' => 5,
        'title' => 'Water Falls',
        'subtitle' => 'We travel not to escape life, but for life not to escape us.',
        'img_modifier' => '/src/images/people1.svg',
        'background' => '/src/images/MostRecent/3.jpg',
        'post' => 'Lake',
        'author' => 'Mat Vogels',
        'date' => 1443139200
      ],
      [
        'id' => 6,
        'title' => 'Through the Mist',
        'subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
        'img_modifier' => '/src/images/people2.svg',
        'background' => '/src/images/MostRecent/4.jpg',
        'post' => 'Ocean',
        'author' => 'William Wong',
        'date' => 1443139200
      ],
      [
        'id' => 7,
        'title' => 'Awaken Early',
        'subtitle' => 'Not all those who wander are lost.',
        'img_modifier' => '/src/images/people1.svg',
        'background' => '/src/images/MostRecent/5.jpg',
        'post' => 'Cable car',
        'author' => 'Mat Vogels',
        'date' => 1443139200
      ],
      [
        'id' => 8,
        'title' => 'Try it Always',
        'subtitle' => 'The world is a book, and those who do not travel read only
        one page.',
        'img_modifier' => '/src/images/people1.svg',
        'background' => '/src/images/MostRecent/6.jpg',
        'post' => 'Rainbow',
        'author' => 'Mat Vogels',
        'date' => 1443139200
      ]
    ];
    ?>
<?php 
    require "db.php";
    $connection = createDBConnection();
    $posts = getPostsFromDB($connection);
    closeDBConnection($connection);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/src/styles/fonts.css" />
    <link rel="stylesheet" href="/src/styles/reset.css" />
    <link rel="stylesheet" href="/src/styles/style.css" />
    <title>Blog</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="overlay"></div>
      <header class="header">
        <div class="header__container">
          <div class="header__top">
            <div class="header__top-inner">
              <a class="header__logo logo" href="home">
                <img src="/src/images/logo-footer.svg" alt="Logo" />
              </a>
              <a class="header__menu header__menu--follow" href="#">
                <span></span>
              </a>
              <div class="header__nav-box navs">
                <ul class="header__nav-list">
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
          <div class="header__main">
            <div class="header__main-inner">
              <h1 class="header__title">Let's do it together.</h1>
              <p class="header__subtitle">
                We travel the world in search of stories. Come along for the
                ride.
              </p>
              <a href="#"><div class="header__button button">View Latest Posts</div></a>
            </div>
          </div>
        </div>
        <div class="header__bottom-box">
          <ul class="header__bottom-list">
            <li class="header__bottom-item">
              <a href="#">Nature</a>
            </li>
            <li class="header__bottom-item">
              <a href="#">Photography</a>
            </li>
            <li class="header__bottom-item">
              <a href="#">Relaxation</a>
            </li>
            <li class="header__bottom-item">
              <a href="#">Vacation</a>
            </li>
            <li class="header__bottom-item">
              <a href="#">Travel</a>
            </li>
            <li class="header__bottom-item">
              <a href="#">Adventure</a>
            </li>
          </ul>
        </div>
      </header>
      <main class="main">
        <div class="main__container">
          <section class="main__featured">
            <div class="main__title-box">
              <h2 class="main__title">Featured Posts</h2>
              <div class="main__line"></div>
            </div>
            <div class="main__featured-box">
              <div class="main__featured-inner">
                <?php
                  foreach ($posts as $post) {
                    if ($post['featured'] == 1) {
                      include 'post_preview.php';
                    }
                  }         
                ?>
              </div> 
            </div>
          </section>
          <section class="main__recent">
            <div class="main__title-box">
              <h2 class="main__title">Most Recent</h2>
              <div class="main__line"></div>
            </div>
            <div class="main__recent-inner">
              <?php
                foreach ($posts as $post) {
                  if ($post['featured'] == 0) {
                    include 'post_recent.php';
                  }
                }         
              ?> 
            </div>
          </section>
        </div>
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
              <input class="form__text" type="text" maxlength="50" placeholder="Enter your email address">
              <button class="form__button" type="submit">Submit</button>
            </form>
          </div>
          <div class="footer__top-inner">
            <a class="footer-logo logo" href="home">
              <img src="/src/images/logo-footer.svg" alt="Logo" />
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
