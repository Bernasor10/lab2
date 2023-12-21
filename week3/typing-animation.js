document.addEventListener('DOMContentLoaded', () => {
    const elementsToAnimate = document.querySelectorAll('.animate-text');
    let currentElementIndex = 0;

    // Handle logo click to scroll to top
    const logo = document.querySelector('.navbar .logo');
    logo.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent default link behavior
        window.scrollTo({ top: 0, behavior: 'smooth' }); // Smoothly scroll to the top

        // Wait for the scroll to finish before reloading
        setTimeout(() => {
            window.location.reload(true); // Force a reload from the server
        }, 1000); // Adjust the timeout duration as needed
    });

    // Hide all elements initially
    elementsToAnimate.forEach(element => {
        element.style.visibility = 'hidden';
    });

    function typeSentence(element, sentences, sentenceIndex) {
        if (sentenceIndex < sentences.length) {
            element.style.visibility = 'visible';
            const span = document.createElement('span');
            span.innerHTML = sentences[sentenceIndex] + (sentenceIndex < sentences.length - 1 ? '<br>' : '');
            span.style.overflow = 'hidden';
            span.style.whiteSpace = 'nowrap';
            span.style.display = 'inline-block';
            span.style.animation = 'typing 2s steps(30, end) forwards, blink-cursor 0.75s step-end infinite';
            element.appendChild(span);
    
            // Set timeout for next sentence
            setTimeout(() => typeSentence(element, sentences, sentenceIndex + 1), 2000);
        } else if (currentElementIndex < elementsToAnimate.length - 1) {
            // Continue to the next element
            typeNextElement();
        } else {
            // Typing animation finished, add class for blinking cursor
            document.getElementById('typing-paragraph').classList.add('typing-finished');
        }
    }
    function typeSentence(element, sentences, sentenceIndex) {
        if (sentenceIndex < sentences.length) {
            element.style.visibility = 'visible';
            const span = document.createElement('span');
            span.innerHTML = sentences[sentenceIndex] + (sentenceIndex < sentences.length - 1 ? '<br>' : '');
            span.style.overflow = 'hidden';
            span.style.whiteSpace = 'nowrap';
            span.style.display = 'inline-block';
            span.style.animation = 'typing 2s steps(30, end) forwards, blink-cursor 0.75s step-end infinite';
            element.appendChild(span);

            setTimeout(() => typeSentence(element, sentences, sentenceIndex + 1), 2000);
        } else if (currentElementIndex < elementsToAnimate.length) {
            typeNextElement();
        }
    }

    function typeNextElement() {
        if (currentElementIndex >= elementsToAnimate.length) return;
        const element = elementsToAnimate[currentElementIndex];
        const sentences = element.innerHTML.split('<br>');
        element.innerHTML = '';
        currentElementIndex++;
        typeSentence(element, sentences, 0);
    }

    typeNextElement(); // End of the typing animation code

    // Smooth scrolling functionality
    const smoothScroll = (target, duration) => {
        const targetPosition = target.getBoundingClientRect().top - document.querySelector('.navbar').offsetHeight;
        let startPosition = window.pageYOffset;
        let startTime = null;

        const ease = (time) => {
            return time < 0.5 ? 2 * time * time : -1 + (4 - 2 * time) * time;
        };

        const animation = (currentTime) => {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const t = ease(timeElapsed / duration);
            window.scrollTo(0, startPosition + targetPosition * t);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        };

        requestAnimationFrame(animation);
    };

    // Add event listener to navigation links
    const navLinks = document.querySelectorAll('.navbar a[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            smoothScroll(targetSection, 1000);
        });
    });

    // Add smooth scroll to the 'Ronaldo' logo
    document.querySelector('.navbar .logo').addEventListener('click', (e) => {
        e.preventDefault();
        smoothScroll(document.body, 1000); // Scroll to the top of the document
    });

    // Toggle footer visibility based on active section
    const toggleFooterVisibility = () => {
        const footer = document.querySelector('footer');
        const contactSection = document.querySelector('#contact');
        const isContactInView = contactSection.getBoundingClientRect().top < window.innerHeight &&
                                contactSection.getBoundingClientRect().bottom >= 0;

        footer.style.display = isContactInView ? 'block' : 'none';
    };

    window.addEventListener('scroll', toggleFooterVisibility);
    toggleFooterVisibility();

    // Function to update navigation link activation based on scroll position
    const updateActiveNav = () => {
        const sections = document.querySelectorAll('.main-content, section');
        const navLinks = document.querySelectorAll('.navbar a');

        let currentActive = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            if (window.pageYOffset >= (sectionTop - sectionHeight / 3) &&
                window.pageYOffset < (sectionTop + sectionHeight - sectionHeight / 3)) {
                currentActive = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + currentActive) {
                link.classList.add('active');
            }
        });
    };

    window.addEventListener('scroll', updateActiveNav);
    updateActiveNav();

    // Handle hash changes
    window.addEventListener('hashchange', () => {
        const hash = window.location.hash;
        if (hash === '#contact') {
            footer.style.display = 'block';
        } else {
            footer.style.display = 'none';
        }
    });
});