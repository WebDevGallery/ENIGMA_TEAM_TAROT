// You can use JavaScript to manipulate the iframe source dynamically
const inAppBrowser = document.getElementById('inAppBrowser');

// Example: Change iframe source after 5 seconds
setTimeout(() => {
  inAppBrowser.src = 'https://meet.google.com/';
}, 5000);
