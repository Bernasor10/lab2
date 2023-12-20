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
            span.style.animation = 'typing 2s steps(30, end) forwards, blink 0.75s step-end infinite';
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

    typeNextElement();
});