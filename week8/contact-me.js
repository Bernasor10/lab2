document.addEventListener('DOMContentLoaded', function() {
    // Contact Me Section Logic
    var form = document.getElementById('suggestion-form');
    var likeButton = document.getElementById('like-button');
    var likeCountElement = document.getElementById('like-count');
    var likeCount = 0;
    var messages = [
        'Thanks for your feedback!', 
        'We appreciate your feedback!', 
        'Your feedback is valuable to us!', 
        'Thank you for sharing your thoughts!', 
        'We are always open to suggestions!', 
        'Your input helps us improve!', 
        'We are grateful for your constructive feedback!', 
        'Your insights are important to us!', 
        'Thank you for helping us enhance our services!', 
        'Your opinion matters to us!'
    ];

    // Form submission handling
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            var fullname = document.getElementById('fullname').value;
            var email = document.getElementById('email').value;
            var message = document.getElementById('message').value;
            console.log("Full Name: " + fullname + ", Email: " + email + ", Message: " + message);

            // Additional logic for form submission (e.g., sending data to a server) can be added here
        });
    }

    // Like button handling
    if (likeButton && likeCountElement) {
        likeButton.addEventListener('click', function() {
            likeCount++;
            likeButton.className = 'fa-solid fa-thumbs-up'; // Change icon to solid on click
            likeCountElement.textContent = 'Like Count: ' + likeCount;

            var randomIndex = Math.floor(Math.random() * messages.length);
            alert(messages[randomIndex]);
        });
    }
});
