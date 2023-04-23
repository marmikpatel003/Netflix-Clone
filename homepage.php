<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | Netflix</title>
    <link rel="icon" href="https://1000logos.net/wp-content/uploads/2017/05/Netflix-Logo-2006.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/homepage.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:wght@300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/7433d3320f.js"
      crossorigin="anonymous"
    ></script>

    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.12.1.min.js"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"
    />
  </head>

  <body>
    <!-- Navbar Section -->
    <div class="navbar">
      <div class="navbar-container">
        <div class="logo-container">
          <img src="images/logo.png" class="logo" />
        </div>
        <div class="profile-container">
          <div class="profile-text-container">
            <a
              class="profile-text"
              href="logout.php"
              style="
                padding: 10px;
                text-decoration: none;
                text-transform: uppercase;
                letter-spacing: 1.5px;
              "
              >Log out</a
            >
          </div>
          <img src="images/profile.png" class="profile-picture" />
        </div>
      </div>
    </div>

    <!-- Banner Section -->
    <div class="container">
    <div class="content-container">
      <div class="slide-container">
        <div class="slide fade">
          <img src='images/sld1.jpg' alt=''>
        </div>
        <div class="slide fade">
          <img src='images/sld2.jpg' alt=''>
        </div>
        <div class="slide fade">
          <img src='images/sld3.jpg' alt=''>
        </div>
        <div class="slide fade">
          <img src='images/sld4.jpg' alt=''>
        </div>

        <a href="#" class="prev" title="Previous">&#10094</a>
        <a href="#" class="next" title="Next">&#10095</a>
      </div>
      <div class="dots-container">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>

        <!-- Featured Movie Section  -->
        <div class="movie-list-container">
          <h1 class="movie-list-title">New Releases</h1>
          <div class="movie-list-wrapper">
            <div class="movie-list">
              <div class="movie-list-item">
                <img src="images/1.jpeg" class="movie-list-item-img" />
                <a
                  class="movie-list-item-button"
                  href="https://www.youtube.com/watch?v=dJTU48_yghs"
                  >Watch Trailer</a
                >
              </div>
              <div class="movie-list-item">
                <img src="images/2.jpeg" class="movie-list-item-img" />
                <a
                  class="movie-list-item-button"
                  href="https://www.youtube.com/watch?v=8Qn_spdM5Zg"
                  >Watch Trailer</a
                >
              </div>
              <div class="movie-list-item">
                <img src="images/3.jpg" class="movie-list-item-img" />
                <a
                  class="movie-list-item-button"
                  href="https://www.youtube.com/watch?v=xBH25XxM-7g"
                  >Watch Trailer</a
                >
              </div>
              <div class="movie-list-item">
                <img src="images/4.jpg" class="movie-list-item-img" />
                <a
                  class="movie-list-item-button"
                  href="https://www.youtube.com/watch?v=YqNYrYUiMfg"
                  >Watch Trailer</a
                >
              </div>
            </div>
          </div>
        </div>

        <!-- Featured Movie Section  -->
        <div class="movie-list-container">
          <h1 class="movie-list-title">Trending Now</h1>
          <div class="movie-list-wrapper">
            <div class="movie-list">
              <div class="movie-list-item">
                <img src="images/5.jpg" class="movie-list-item-img" />
                <a
                  class="movie-list-item-button"
                  href="https://www.youtube.com/watch?v=eOrNdBpGMv8"
                  >Watch Trailer</a
                >
              </div>
              <div class="movie-list-item">
                <img src="images/6.jpg" class="movie-list-item-img" />
                <a
                  class="movie-list-item-button"
                  href="https://www.youtube.com/watch?v=coOKvrsmQiI"
                  >Watch Trailer</a
                >
              </div>
              <div class="movie-list-item">
                <img src="images/7.jpg" class="movie-list-item-img" />
                <a
                  class="movie-list-item-button"
                  href="https://www.youtube.com/watch?v=QAEkuVgt6Aw"
                  >Watch Trailer</a
                >
              </div>
              <div class="movie-list-item">
                <img src="images/8.jpg" class="movie-list-item-img" />
                <a
                  class="movie-list-item-button"
                  href="https://www.youtube.com/watch?v=A27xPYvqERw"
                  >Watch Trailer</a
                >
              </div>
            </div>
          </div>
        </div>

        <!-- Featured Movie Section  -->
        <div class="movie-list-container">
          <h1 class="movie-list-title">Recommended For You</h1>
          <div class="movie-list-wrapper">
            <div class="movie-list">
              <div class="movie-list-item">
                <img src="images/9.jpg" class="movie-list-item-img" />
                <a
                  class="movie-list-item-button"
                  href="https://www.youtube.com/watch?v=JTSoD4BBCJc"
                  >Watch Trailer</a
                >
              </div>
              <div class="movie-list-item">
                <img src="images/10.jpg" class="movie-list-item-img" />
                <a
                  class="movie-list-item-button"
                  href="https://www.youtube.com/watch?v=hEtu68oxBfc"
                  >Watch Trailer</a
                >
              </div>
              <div class="movie-list-item">
                <img src="images/11.jpg" class="movie-list-item-img" />
                <a
                  class="movie-list-item-button"
                  href="https://www.youtube.com/watch?v=Kt39nS-kJ9U"
                  >Watch Trailer</a
                >
              </div>
              <div class="movie-list-item">
                <img src="images/12.jpg" class="movie-list-item-img" />
                <a
                  class="movie-list-item-button"
                  href="https://www.youtube.com/watch?v=-tnxzJ0SSOw"
                  >Watch Trailer</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(function () {
        $(".movie-list-item-button").magnificPopup({
          disableOn: 700,
          type: "iframe",
          mainClass: "mfp-fade",
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false,
        });
      });
    </script>

    <script src="script1.js"></script>
  </body>
</html>
