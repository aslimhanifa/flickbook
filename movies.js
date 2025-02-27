// Get references to DOM elements
const movieSelect = document.getElementById('movie');
const dateInput = document.getElementById('movie-date');
const timeRadios = document.querySelectorAll('input[name="time"]');
const seats = document.querySelectorAll('.row .seat');
const bookButton = document.getElementById('book-button');
const countDisplay = document.getElementById('count');
const totalDisplay = document.getElementById('total');
const errorMessage = document.getElementById('error-message');
const bookingLink = document.getElementById('booking-link');

// Function to update seat count and total price
function updateSelectedCount() {
    const selectedSeats = document.querySelectorAll('.row .seat.selected');
    const seatCount = selectedSeats.length;
    countDisplay.innerText = seatCount;
    totalDisplay.innerText = seatCount * +movieSelect.value;
}

// Function to validate selections
function validateSelections() {
    const selectedSeats = document.querySelectorAll('.row .seat.selected').length > 0;
    const dateSelected = dateInput.value !== "";
    const timeSelected = document.querySelector('input[name="time"]:checked') !== null;

    // Clear previous error messages
    errorMessage.innerText = '';

    // Validation checks
    if (!movieSelect.value) {
        errorMessage.innerText += "Please select a movie. ";
    }
    if (!dateSelected) {
        errorMessage.innerText += "Please select a date. ";
    }
    if (!selectedSeats) {
        errorMessage.innerText += "Please select at least one seat. ";
    }
    if (!timeSelected) {
        errorMessage.innerText += "Please select a time. ";
    }

    // Return true if all validations pass
    return errorMessage.innerText === '';
}

// Event listener for seat selection
seats.forEach(seat => {
    seat.addEventListener('click', () => {
        if (!seat.classList.contains('sold')) {
            seat.classList.toggle('selected');
            updateSelectedCount();
        }
    });
});

// Event listener for the book button
bookButton.addEventListener('click', (event) => {
    if (!validateSelections()) {
        event.preventDefault(); // Prevent navigation to booking page
    } else {
        // Redirect to the booking page (you can set this link based on your actual page)
        window.location.href = "Payment.html";
    }
});

// Event listeners for movie and date changes
movieSelect.addEventListener('change', updateSelectedCount);
dateInput.addEventListener('change', updateSelectedCount);
