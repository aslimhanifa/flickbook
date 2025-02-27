<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="contactus.js" defer></script>
    <link rel="stylesheet" href="contactus.css">
</head>
<body>
<header class="site-header">
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
            <li><a href="userrep.php">Messages</a></li>
        </ul>
    </nav>
</header>

<section>
    <div class="contact-container">
        <h1>Contact Us</h1>
        <form id="contactForm" method="POST" action="submit_contact.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            
            <button type="submit">Submit</button>
        </form>
        <div id="responseMessage"></div>
    </div>
</section>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-column">
            <h4>About Flickbook</h4>
            <p>Your ultimate movie booking platform. Fast, reliable, and easy to use.</p><br>
            <a href="privacy-policy.php">Privacy Policy</a>
        </div>
        <div class="footer-column">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="Index.php">Home</a></li>
                <li><a href="movies.php">Movies</a></li>
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
