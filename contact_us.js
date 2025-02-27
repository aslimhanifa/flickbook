document.getElementById("contactForm").onsubmit = function(event) {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;

    if (!name || !email || !message) {
        event.preventDefault();
        alert("All fields are required!");
    }
};
