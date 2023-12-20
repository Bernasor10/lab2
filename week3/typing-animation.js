document.addEventListener('DOMContentLoaded', () => {
    const elementsToAnimate = document.querySelectorAll('.animate-text');
    let currentElementIndex = 0;

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
    const navLinks = document.querySelectorAll('.navbar a[href^="#"]');

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

    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            smoothScroll(targetSection, 1000); // Adjust duration as needed
            // Manually set active class on clicked nav item
            navLinks.forEach(lnk => lnk.classList.remove('active'));
            link.classList.add('active');
        });
    });

    // Toggle footer visibility based on active section
    const toggleFooterVisibility = () => {
        const footer = document.querySelector('footer');
        const contactSection = document.querySelector('#contact');
        const isContactInView = contactSection.getBoundingClientRect().top < window.innerHeight &&
                                contactSection.getBoundingClientRect().bottom > 0;

        footer.style.display = isContactInView ? 'block' : 'none';
    };

    // Check footer visibility on scroll and load
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

            // Adjust the range in which a section is considered active
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

    // Call updateActiveNav on scroll and load
    window.addEventListener('scroll', updateActiveNav);
    updateActiveNav();

    // Additional script to handle hash changes
    window.addEventListener('hashchange', () => {
        const hash = window.location.hash;
        if (hash === '#contact') {
            footer.style.display = 'block';
        } else {
            footer.style.display = 'none';
        }
    });
});