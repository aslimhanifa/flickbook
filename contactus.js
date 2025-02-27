document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission

        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let message = document.getElementById("message").value.trim();
        let responseMessage = document.getElementById("responseMessage");

        if (name === "" || email === "" || message === "") {
            responseMessage.innerHTML = "Please fill out all fields.";
            responseMessage.style.color = "red";
            return;
        }

        // Simulate form submission
        responseMessage.innerHTML = "Thank you for your message, " + name + "! We will get back to you soon.";
        responseMessage.style.color = "green";
        
        // Clear form fields after submission
        document.getElementById("contactForm").reset();
    });
});
