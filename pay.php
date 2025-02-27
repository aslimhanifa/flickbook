<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="paycss.css">
    
</head>
<body>
    <header>
        <div class="logo">
            <h1>🎬 Flickbook</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="movies.php">Movies</a></li>
                <li><a href="now_showing.php">Now Showing</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="profile.php">profile</a></li>
            </ul>
        </nav>
    </header>
<div class="container">
    <h2>Payment Information</h2>

    <form action="Acreate.php" method="get">
        
        <div>
            <label for="paymentMethod">Card Type</label>
            <select id="paymentMethod" name="Card_Type" required>
                <option value="" disabled selected>Select a Card Type</option>
                <option value="visa">Visa Card</option>
                <option value="mastercard">MasterCard</option>
                </select>
        </div>

        <div>
            <label for="cardName">Cardholder Name</label>
            <input type="text" id="cardName" name="Cardholder_Name" placeholder="Enter your name" required>
        </div>

        <div>
            <label for="cardNumber">Card Number</label>
            <input type="number" id="cardNumber" name="Card_Number" placeholder="Enter your card number" required>
        </div>

        <div>
            <label for="expiry">Expiry Date (MM/YY)</label>
            <input type="text" id="expiry" name="ExpiryDate" placeholder="MM/YY" required>
        </div>

        <div>
            <label for="cvv">CVV</label>
            <input type="number" id="cvv" name="CVV" placeholder="CVV" required>
        </div>

        <div>
            <label for="email">Email Address</label>
            <input type="text" id="email" name="Email_Address" placeholder="Enter your email address" required>
        </div>

        <button type="submit" class="btn-submit">Submit Payment</button>
    </form>
</div>
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
<script src="payjs.js"></script>
</body>
</html>
