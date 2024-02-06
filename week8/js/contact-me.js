  document.addEventListener('DOMContentLoaded', function() {

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
      likeCountElement.textContent = 'Total Likes: ' + count;
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
    // Check if the user has already liked in this session
    if (sessionStorage.getItem('liked')) {
      return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "like_handler.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (this.status === 200) {
        getLikeCount(); // Refresh the like count after successful update

        // Show random thank you message
        var randomIndex = Math.floor(Math.random() * messages.length);
        alert(messages[randomIndex]);

        // Set the 'liked' session storage item
        sessionStorage.setItem('liked', 'true');
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

  // Clear sessionStorage when the page is refreshed or closed
  window.addEventListener('beforeunload', function() {
    sessionStorage.clear();
  });

  // Initialize the like count when the page loads
  getLikeCount();
  });