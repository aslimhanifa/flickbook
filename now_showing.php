<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Now Showing - Movie Booking</title>
  <link rel="stylesheet" href="now_showing.css">
</head>
<body>
<header>
        <div class="logo">
            <h1>🎬 Flickbook</h1>
        </div>
        <nav>
        <ul>
                <li><a href="Index.php">Home</a></li>
                <li><a href="book.php">Movies</a></li>
                <li><a href="now_showing.php">Now Showing</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="profile.php">Profile</a></li>
            
            </ul>
        </nav>
    </header>
  <!-- Header Section (Cover) -->
  <header class="cover">
    <div class="overlay">
      <h1>Now Showing</h1>
      <p>Catch the latest blockbusters in theatres now!</p>
    </div>
  </header>

  <!-- Now Showing Section -->
  <section class="now-showing">
    <h2>Now Showing in Theatres</h2>
    <div class="movies-grid">
      <!-- Movie Card 1 -->
      <div class="movie-card">
        <img src="deadpool.png" alt="Movie 1">
        <h3>Deadpool & Wolverine</h3>
        <p>Genre: Action | Duration: 2h 10m</p>
        <div class="showtimes">
          <p>Showtimes:</p>
          <span>11:00AM</span>|<span>2:00PM</span>|<span>5:30PM</span>
        </div>
       
      </div>

      <!-- Movie Card 2 -->
      <div class="movie-card">
        <img src="jhone.jpg" alt="Movie 2">
        <h3>Jhone Wick</h3>
        <p>Genre: Drama | Duration: 1h 50m</p>
        <div class="showtimes">
          <p>Showtimes:</p>
          <span>10:30AM</span>|<span>1:45PM</span>|<span>4:00PM</span>
        </div>
        
      </div>

      <!-- Movie Card 3 -->
      <div class="movie-card">
        <img src="smile.jpg" alt="Movie 3">
        <h3>Smile</h3>
        <p>Genre: Sci-Fi | Duration: 2h 20m</p>
        <div class="showtimes">
          <p>Showtimes:</p>
          <span>12:00PM</span>|<span>3:30PM</span>|<span>7:00PM</span>
        </div>
       
      </div>
      <!-- Movie Card 4 -->
     <div class="movie-card">
        <img src="After.jpg" alt="Movie 3">
        <h3>After</h3>
        <p>Genre: Comedy | Duration: 1h 45m</p>
        <div class="showtimes">
          <p>Showtimes:</p>
          <span>11:15AM</span>|<span>3:30PM</span>|<span>7:00PM</span>
        </div>
       
      </div>
    </div>
  </section>
  <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h4>About Flickbook</h4>
                <p>Your ultimate movie booking platform. Fast, reliable, and easy to use.</p>
                <a href="privacy-policy.php">Privacy policy</a>
            </div>
            <div class="footer-column">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="Index.php">Home</a></li>
                    <li><a href="book.php">Movies</a></li>
                    <li><a href="Contact_us.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Follow Us</h4>
                <ul class="social-media">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Flickbook. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
