document.addEventListener('DOMContentLoaded', function() {
  // Only run the welcome message logic on the home.html page
  if (window.location.href.endsWith('home.html') || window.location.pathname === '/' || window.location.pathname.endsWith('index.html')) {
    // Welcome message logic
    if (!localStorage.getItem('visited')) {
      alert('Welcome Adventurer!'); // Alert for first-time visitors
      localStorage.setItem('visited', 'true');
    } else {
      alert('Welcome back, Adventurer!'); // Alert for returning visitors
    }
  }

    // Contact Me Section Logic
    var likeButton = document.getElementById('like-button');
    var likeCountElement = document.getElementById('like-count');
    var likeCount = 0;
    var messages = [
      'Your support means a lot to us. Thank you!',
      'Thanks for the thumbs up!',
      'Your feedback lights up our day. Thank you!',
      'Heartfelt thanks for your positive vibes!',
      'Your approval fuels our passion. Thanks for liking!',
      'Thanks for the boost! Your feedback propels us forward.',
      'Every bit of feedback counts. Thanks for yours!',
      'Your positive response is truly cherished. Thank you!',
      'Together, we grow better. Thanks for the like!',
      'Your encouragement is warmly received.'
    ];

      // Function to update the like count display
  function updateLikeCount(count) {
    likeCountElement.textContent = 'Like Count: ' + count;
  }

  // Function to retrieve the current like count from the server
  function getLikeCount() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "like_handler.php", true);
    xhr.onload = function() {
      if (this.status === 200) {
        updateLikeCount(this.responseText);
      }
    };
    xhr.send();
  }

  // Function to send a like to the server
  function sendLike() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "like_handler.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (this.status === 200) {
        getLikeCount(); // Refresh the like count after successful update
        var randomIndex = Math.floor(Math.random() * messages.length);
        alert(messages[randomIndex]); // Show random thank you message
      }
    };
    xhr.send();
  }

  var oldLikeButton = document.getElementById('like-button');
  var newLikeButton = oldLikeButton.cloneNode(true);
  oldLikeButton.parentNode.replaceChild(newLikeButton, oldLikeButton);
  
  newLikeButton.addEventListener('click', function() {
    newLikeButton.className = 'fa-solid fa-thumbs-up'; // Change icon to solid on click
    sendLike();
  });
  

  // Initialize the like count when the page loads
  getLikeCount();

  // Sidebar functionality
  var menuToggle = document.querySelector('.menu-toggle');
  var sidebar = document.getElementById("mySidebar");
  var body = document.body;

  function openSidebar() {
      sidebar.style.width = "250px";
      body.classList.add('body-no-scroll');
      menuToggle.classList.add('active');
  }

  function closeSidebar() {
      sidebar.style.width = "0";
      body.classList.remove('body-no-scroll');
      menuToggle.classList.remove('active');
  }

  menuToggle.addEventListener('click', function() {
      var isOpen = sidebar.style.width === "250px";
      isOpen ? closeSidebar() : openSidebar();
  });

  var closeButton = document.querySelector('.closebtn');
  closeButton.addEventListener('click', closeSidebar);

  document.addEventListener('click', function(event) {
      var isClickInsideSidebar = sidebar.contains(event.target);
      var isClickInsideMenuToggle = menuToggle.contains(event.target);

      if (!isClickInsideSidebar && !isClickInsideMenuToggle && sidebar.style.width === '250px') {
          closeSidebar();
      }
  });

  // Smooth scrolling for anchor links
  $('a[href^="#"]').on('click', function(e) {
    e.preventDefault();
    var target = this.hash;
    var $target = $(target);
    $('html, body').stop().animate({
        'scrollTop': $target.offset().top
    }, 500, 'swing', function() {
        window.location.hash = target;
    });
});

// Display local time and timezone
var timeElement = document.getElementById('time');

function displayLocalTimeAndTimezone() {
    var date = new Date();
    var localTime = date.toLocaleTimeString();
    var localDate = date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }); // Change 'long' to 'short'
    var timeZone = /\((.*)\)/.exec(date.toString())[1];
    timeElement.textContent = 'Current date: ' + localDate + ', Current time: ' + localTime + ', Current Timezone: ' + timeZone;
}

displayLocalTimeAndTimezone();
setInterval(displayLocalTimeAndTimezone, 1000);

  // Typing animation for .type1
  var i = 0, j = 0;
  var txt = ['Potato Lover', 'Gamer 😎', 'Web Programmer', 'BSIT Student', 'Computer Enthusiast', 'UI/UX Designer', 'Lifelong Learner', 'Cat Lover', 'Dog Lover'];
  var speed = 80; // Speed of typing in milliseconds
  var deleteSpeed = 50; // Speed of deleting in milliseconds
  var waitAfterDelete = 900; // Wait time after deleting in milliseconds
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