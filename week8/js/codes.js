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