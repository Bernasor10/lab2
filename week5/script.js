document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.querySelector('.menu-toggle');
    var sidebar = document.getElementById("mySidebar");
    var body = document.body;
    var logo = document.getElementById('logo');
    var messages = ['Thanks for your feedback!', 'We appreciate your feedback!', 'Your feedback is valuable to us!',
    'Thank you for sharing your thoughts!','We are always open to suggestions!','Your input helps us improve!',
        'We are grateful for your constructive feedback!','Your insights are important to us!',
        'Thank you for helping us enhance our services!','Your opinion matters to us!']; // Array of messages
    var likeButton = document.getElementById('like-button');
    var likeCountElement = document.getElementById('like-count');
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

    // Prevent default function
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

        // Finally, I can now use these values to send an email, save to a database, etc.
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

    var i = 0;
    var j = 0;
    var txt = ['Potato Lover', 'Web Programmer', 'BSIT Student', 'Computer Enthusiast', 'UI/UX Designer', 
    'Coding Hobbyist', 'Lifelong Learner', 'Cat Lover', 'Dog Lover'];
    var speed = 100; // Speed of typing in milliseconds
    var deleteSpeed = 50; // Speed of deleting in milliseconds
    var waitAfterDelete = 1000; // Wait time after deleting in milliseconds
    var waitAfterType = 1000; // Wait time after typing in milliseconds
    var cursorVisible = true;
    
    function typeWriter() {
      if (i < txt[j].length) {
        document.querySelector('.type1').innerHTML = txt[j].substring(0, i+1) + (cursorVisible ? '|' : '');
        i++;
        setTimeout(typeWriter, speed);
      } else {
        setTimeout(deleteWriter, waitAfterType);
      }
    }
    
    function deleteWriter() {
        if (i > 0) {
          var temp = txt[j].substring(0, i);
          document.querySelector('.type1').innerHTML = temp + (cursorVisible ? '|' : '');
          i--;
          setTimeout(deleteWriter, deleteSpeed);
        } else {
          document.querySelector('.type1').innerHTML = (cursorVisible ? '|' : '\xa0');
          if (j < txt.length - 1) {
            j++;
          } else {
            j = 0;
          }
          setTimeout(typeWriter, waitAfterDelete);
        }
      }
    
    function toggleCursor() {
      cursorVisible = !cursorVisible;
      if (i >= 0 && i <= txt[j].length) {
        document.querySelector('.type1').innerHTML = txt[j].substring(0, i) + (cursorVisible ? '|' : '');
      }
      setTimeout(toggleCursor, 500);
    }
    
    typeWriter();
    toggleCursor();

});