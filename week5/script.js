document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.querySelector('.menu-toggle');
    var sidebar = document.getElementById("mySidebar");
    var body = document.body; // Reference to the body element
    var logo = document.getElementById('logo'); // Reference to the logo element
    var messages = ['Thanks for your feedback!', 'We appreciate your feedback!', 'Your feedback is valuable to us!']; // Array of messages
    var likeButton = document.getElementById('like-button'); // Reference to the like button
    var likeCountElement = document.getElementById('like-count'); // Reference to the like count element
    var likeCount = 0; // Like count

    // Function to open the sidebar
    function openSidebar() {
        sidebar.style.width = "250px";
        body.classList.add('body-no-scroll'); // Disable scrolling
        menuToggle.classList.add('active');
        document.addEventListener('touchmove', preventDefault, { passive: false });
    }

    // Function to close the sidebar
    function closeSidebar() {
        sidebar.style.width = "0";
        body.classList.remove('body-no-scroll');
        menuToggle.classList.remove('active');
        document.removeEventListener('touchmove', preventDefault, { passive: false });
    }

    function preventDefault(e) {
        e.preventDefault();
    }

    // Toggle the sidebar on click
    menuToggle.addEventListener('click', function() {
        var isOpen = sidebar.style.width === "250px";
        if (isOpen) {
            closeSidebar();
        } else {
            openSidebar();
        }
    });

    // Close the sidebar by clicking the close button
    var closeButton = document.querySelector('.closebtn');
    closeButton.addEventListener('click', closeSidebar);

    // Close the sidebar by clicking outside of it
    document.addEventListener('click', function(event) {
        var isClickInsideSidebar = sidebar.contains(event.target);
        var isClickInsideMenuToggle = menuToggle.contains(event.target);

        if (!isClickInsideSidebar && !isClickInsideMenuToggle && sidebar.style.width === '250px') {
            closeSidebar();
        }
    });

    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
    
        var target = this.hash;
        var $target = $(target);
    
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 1000, 'swing', function() {
            window.location.hash = target;
        });
    });

    var timeElement = document.getElementById('time');

    // Function to get user's local time, date, and timezone
    function displayLocalTimeAndTimezone() {
        var date = new Date();
        var localTime = date.toLocaleTimeString();
        var localDate = date.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });

        // Get timezone
        var timeZone = /\((.*)\)/.exec(date.toString())[1];

        timeElement.textContent = 'Local date: ' + localDate + ', Local time: ' + localTime + ', Timezone: ' + timeZone;
    }

    displayLocalTimeAndTimezone();

    // Update the time every second
    setInterval(displayLocalTimeAndTimezone, 1000);

    // Get a reference to the form
    var form = document.getElementById('suggestion-form');

    function handleFormSubmit(event) {
        event.preventDefault();

        // Get the form values
        var fullname = document.getElementById('fullname').value;
        var email = document.getElementById('email').value;
        var message = document.getElementById('message').value;

        
        console.log("Full Name: " + fullname + ", Email: " + email + ", Message: " + message);
    }

    // Add the event listener
    form.addEventListener('submit', handleFormSubmit);
    likeButton.addEventListener('click', function() {
        // Switch the icon
        likeButton.className = 'bx bxs-like';

        // Increment the like count
        likeCount++;

        // Update the like count element
        likeCountElement.textContent = 'Like Count: ' + likeCount;

        // Show a random thank you message
        var randomIndex = Math.floor(Math.random() * messages.length);
        alert(messages[randomIndex]);
    });


});