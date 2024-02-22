// countdown.js
function updateCountdown(orderId, remainingTimeElementId) {
    var remainingTimeElement = document.getElementById(remainingTimeElementId);
    var countdownTime = 20; // 20 seconds

    function formatTime(seconds) {
        var minutes = Math.floor(seconds / 60);
        var remainingSeconds = seconds % 60;
        return minutes + 'm ' + remainingSeconds + 's';
    }

    function cancelBooking(orderId) {
        alert("Booking has been canceled due to timeout");
        // Implement your cancellation logic, e.g., redirect to cancel_booking.php
        window.location.href = 'cancel_booking.php?order_id=' + orderId;
    }

    function countdown() {
        remainingTimeElement.innerHTML = formatTime(countdownTime);

        if (countdownTime <= 0) {
            cancelBooking(orderId);
        } else {
            countdownTime--;
            setTimeout(countdown, 1000);
        }
    }

    countdown(); // Start the countdown immediately
}
