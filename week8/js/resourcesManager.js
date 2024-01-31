
class Resource {
    constructor(title, url) {
        this.title = title;
        this.url = url;
    }

    // Method to create a list item for the resource
    createListItem() {
        const listItem = document.createElement('li');
        listItem.className = 'resource-list-item';

        const anchor = document.createElement('a');
        anchor.href = this.url;
        anchor.target = '_blank';
        anchor.textContent = this.title;

        listItem.appendChild(anchor);
        return listItem;
    }
}

// Define categorized resources
const categories = {
    "educational-platforms": [
      new Resource('Khan Academy', 'https://www.khanacademy.org'),
      new Resource('W3Schools.com', 'https://www.w3schools.com'),
    ],
    "social-media-icons": [
      new Resource('BoxIcons', 'https://boxicons.com'),
    ],
    "other-icons": [
      new Resource('Font Awesome', 'https://fontawesome.com'),
    ],
    "live-wallpaper-background": [
      new Resource('Vecteezy.com', 'https://www.vecteezy.com/video/6972050-the-full-moon-at-night-was-full-of-stars-and-a-faint-mist-a-wooden-bridge-extended-into-the-sea-fantasy-image-at-night-super-moon-sea-water-wave-3d-rendering'),
    ],
    "personal-website-inspiration": [
      new Resource('Codehal', 'https://www.youtube.com/watch?v=sQoiM7i5Nqc&list=PLHPgKC5F2XhZxE6u3K7F8caG57JDc6aVy&index=7&t=1s'),
    ],
    "color-palettes": [
      new Resource('Moon Nature Atmosphere', 'https://www.pinterest.ph/pin/812688695256966947/'),
    ],
    "typing-animation-tutorial": [
      new Resource('Html Camp', 'https://www.youtube.com/watch?v=IbGSsy17Ass'),
    ],
    "social-media-border-color": [
      new Resource('Color-hex - GitHub', 'https://www.color-hex.com/color-palette/41067'),
      new Resource('CopyProgramming - Instagram', 'https://copyprogramming.com/howto/instagram-logo-background-color-code-example'),
      new Resource('Designpieces - LinkedIn', 'https://www.designpieces.com/palette/linkedin-color-palette-hex-and-rgb/'),
      new Resource('Schemecolor - Facebook', 'https://www.schemecolor.com/facebook.php'),
    ],
    "gifs": [
      new Resource('Cat Jam GIF', 'https://nloversar.life/product_details/35587960.html'),
      new Resource('Chipi chipi chapa cat GIF', 'https://tenor.com/view/chipi-chipi-chapa-chapa-cat-gif-2724505493463639324'),
      new Resource('Dog with suspicious look GIF', 'https://tenor.com/view/side-eye-dog-suspicious-look-suspicious-doubt-dog-doubt-gif-23680990'),
      new Resource('Huh cat GIF', 'https://tenor.com/view/cat-huh-cat-huh-etr-gif-15332443943609734737'),
      new Resource('Saitama getting mad GIF', 'https://www.pinterest.ph/pin/53691420536993349/')
    ],
    "other-medias": [
      new Resource('Loading Screen Animation', 'https://www.vecteezy.com/video/26651017-loading-bar-animation'),
      new Resource('Random tutorial', 'https://www.youtube.com/watch?v=BbeeuzU5Qc8')
    ],
  };

// Asynchronous function to simulate fetching resources
async function fetchResources() {
  try {
      // Simulating an API call with a timeout
      const resources = await new Promise((resolve) => {
          setTimeout(() => {
              resolve(categories);
          }, 2000); // 2 second delay
      });

      for (const category in resources) {
          const container = document.querySelector(`#${category} .resource-list`);
          if (container && container.children.length === 0) { // Check if the list is empty
              resources[category].forEach(resource => {
                  container.appendChild(resource.createListItem());
              });
          }
      }
  } catch (error) {
      console.error('Failed to fetch resources:', error);
  }
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', fetchResources);
} else {
  fetchResources();
}

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

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.querySelector(".custom-button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
  modal.style.display = "none";
}
}