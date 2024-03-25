document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.advertise-form');
    form.onsubmit = function (e) {
        e.preventDefault(); // Prevent the default form submission

        var companyName = document.getElementById('companyName').value;
        var email = document.getElementById('email').value;
        var message = document.getElementById('message').value;
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!companyName || !email || !message) {
            alert('Please fill out all the fields.');
            return false;
        }

        if (!email.match(emailPattern)) {
            alert('Please enter a valid email address.');
            return false;
        }

        // Show confirmation
        showConfirmation();
    };
});

function showConfirmation() {
    // Create the confirmation message element
    const confirmationMessage = document.createElement('div');
    confirmationMessage.id = 'confirmationMessage';
    confirmationMessage.textContent = 'Your advertisement has been submitted.';
    
    // Style the confirmation message
    confirmationMessage.style.position = 'fixed';
    confirmationMessage.style.left = '50%';
    confirmationMessage.style.top = '50%';
    confirmationMessage.style.transform = 'translate(-50%, -50%)';
    confirmationMessage.style.backgroundColor = '#28a745'; // Bootstrap success green
    confirmationMessage.style.color = 'white';
    confirmationMessage.style.padding = '20px';
    confirmationMessage.style.borderRadius = '5px';
    confirmationMessage.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
    confirmationMessage.style.textAlign = 'center';
    confirmationMessage.style.zIndex = '1000';

    // Append the message to the body
    document.body.appendChild(confirmationMessage);

    // Remove the message after 3 seconds
    setTimeout(function() {
        document.body.removeChild(confirmationMessage);
    }, 3000);
}
