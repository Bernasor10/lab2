document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.querySelector('.menu-toggle');
    var navLinks = document.querySelector('.nav-links');
    var sidebar = document.getElementById("mySidebar");
    var mainContent = document.getElementById("main");

    function openSidebar() {
        sidebar.style.width = "250px";
        mainContent.style.marginLeft = "250px";
        menuToggle.classList.add('active');
    }

    function closeSidebar() {
        sidebar.style.width = "0";
        mainContent.style.marginLeft = "0";
        menuToggle.classList.remove('active');
    }

    // Toggle the sidebar on click
    menuToggle.addEventListener('click', function() {
        if (sidebar.style.width === '250px') {
            closeSidebar();
        } else {
            openSidebar();
        }
    });

    // Close the sidebar by clicking the close button
    var closeButton = document.querySelector('.closebtn');
    if (closeButton) {
        closeButton.addEventListener('click', closeSidebar);
    }

    // Optional: Close the sidebar by clicking on the main content area
    mainContent.addEventListener('click', function(event) {
        if (sidebar.style.width === '250px' && !event.target.matches('.menu-toggle, .menu-toggle *')) {
            closeSidebar();
        }
    });

    // Get all the elements with class 'type'
    let typeElements = document.querySelectorAll('.type');

    // Function to type out text in an element
    function typeText(element, text, delay, callback) {
        let i = 0;
        let typingInterval = setInterval(() => {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
            } else {
                clearInterval(typingInterval);
                element.textContent += '|'; // Add cursor at the end
                if (callback) callback(); // Call the next typing function
            }
        }, delay);
    }

    // Start typing in the first element
    if (typeElements.length > 0) {
        let firstElement = typeElements[0];
        typeText(firstElement, firstElement.getAttribute('data-text'), 100, () => {
            // Code to start typing in the next element
        });
    }
});