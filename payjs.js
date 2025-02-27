document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector('form');
        
        form.addEventListener('submit', function(event) {
            // Prevent form submission for validation
            event.preventDefault();
            
            // Get input values
            const cardType = document.getElementById('paymentMethod').value;
            const cardName = document.getElementById('cardName').value.trim();
            const cardNumber = document.getElementById('cardNumber').value.trim();
            const expiry = document.getElementById('expiry').value.trim();
            const cvv = document.getElementById('cvv').value.trim();
            const email = document.getElementById('email').value.trim();
            
            // Regular expressions for validation
            const cardNumberPattern = /^\d{16}$/; // 16 digits for card number
            const expiryPattern = /^(0[1-9]|1[0-2])\/\d{2}$/; // MM/YY format
            const cvvPattern = /^\d{3}$/; // 3 digits for CVV
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email validation
            
            let valid = true;
            let errorMessage = '';
            
            // Cardholder name validation
            if (cardName.length === 0) {
                valid = false;
                errorMessage += 'Cardholder Name is required.\n';
            }
            
            // Card number validation
            if (!cardNumberPattern.test(cardNumber)) {
                valid = false;
                errorMessage += 'Card Number must be 16 digits.\n';
            }
            
            // Expiry date validation
            if (!expiryPattern.test(expiry)) {
                valid = false;
                errorMessage += 'Expiry Date must be in MM/YY format.\n';
            }
            
            // CVV validation
            if (!cvvPattern.test(cvv)) {
                valid = false;
                errorMessage += 'CVV must be 3 digits.\n';
            }
            
            // Email validation
            if (!emailPattern.test(email)) {
                valid = false;
                errorMessage += 'Please enter a valid email address.\n';
            }
            
            // If valid, submit the form, else show error messages
            if (valid) {
                form.submit(); // Submit the form if valid
            } else {
                alert('Validation Errors:\n' + errorMessage); // Show error messages
            }
        });
    });

