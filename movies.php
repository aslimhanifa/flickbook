<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome.css"> <!-- Link to Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="movies.css" />
    <title>Movie Seat Booking</title>
    <style>
        .error-message {
            color: red;
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="logo">
        <h1>🎬 Flickbook</h1>
    </div>
    <nav>
        <ul>
            <li><a href="Index.php">Home</a></li>
            <li><a href="movies.php">Movies</a></li>
            <li><a href="now_showing.php">Now Showing</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="profile.php">Profile</a></li>
                  </ul>
    </nav>
</header>

<div class="movie-container">
    <label>Movie Name :</label>
    <select id="movie" required>
        <option value="" disabled selected>Select a movie</option>
        <option value="650">Hanu Man (RS.650)</option>
        <option value="850">Teri Baaton Mein Aisa Ulijha Jiya (RS.850)</option>
        <option value="950">The Greatest Night in Pop (RS.950)</option>
    </select>
</div>

<ul class="showcase">
    <li>
        <div class="seat"></div>
        <small>Available</small>
    </li>
    <li>
        <div class="seat selected"></div>
        <small>Selected</small>
    </li>
    <li>
        <div class="seat sold"></div>
        <small>Sold</small>
    </li>
</ul>

<div class="container">
    <div class="screen"></div>

    <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
    </div>

    <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat sold"></div>
        <div class="seat sold"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
    </div>
    <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat sold"></div>
        <div class="seat sold"></div>
    </div>
    <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
    </div>
    <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat sold"></div>
        <div class="seat sold"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
    </div>
    <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat sold"></div>
        <div class="seat sold"></div>
        <div class="seat sold"></div>
        <div class="seat"></div>
    </div>
</div>

<div class="timings">
    <div class="date-picker">
        <label for="movie-date">Select Date:</label>
        <input type="date" id="movie-date" name="movie-date">
    </div>

    <div class="times">
        <input type="radio" name="time" id="t1" />
        <label for="t1" class="time">11:00</label>
        <input type="radio" id="t2" name="time" />
        <label for="t2" class="time">14:30</label>
        <input type="radio" id="t3" name="time" />
        <label for="t3" class="time">18:00</label>
        <input type="radio" id="t4" name="time" />
        <label for="t4" class="time">21:30</label>
    </div>
</div>

<p class="text">
    You have selected <span id="count">0</span> seats for a price of LKR <span id="total">0</span>
</p>
<a href="Payment.html" id="booking-link">
    <div class="Book">
        <button type="button" id="book-button">Book</button>
    </div>
</a>
<div class="error-message" id="error-message"></div> <!-- Placeholder for error messages -->

<footer>
    <div class="footer-container">
        <div class="footer-column">
            <h4>About Flickbook</h4>
            <p>Your ultimate movie booking platform. Fast, reliable, and easy to use.</p>
        </div>
        <div class="footer-column">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Movies</a></li>
                <li><a href="#">Contact Us</a></li>
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
<script src="movies.js"></script>
</body>
</html>
