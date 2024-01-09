document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.querySelector('.menu-toggle');
    var sidebar = document.getElementById("mySidebar");
    var body = document.body; // Reference to the body element

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
    body.classList.remove('body-no-scroll'); // Enable scrolling
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
});