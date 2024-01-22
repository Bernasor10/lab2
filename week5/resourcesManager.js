
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
      new Resource('Vecteezy.com', 'https://www.vecteezy.com/video/9435577-abstract-red-blue-light-sci-fi-tunnel-seamless-loop-4k-3d-animation-background'),
    ],
    "personal-website-inspiration": [
      new Resource('Codehal', 'https://www.youtube.com/watch?v=sQoiM7i5Nqc&list=PLHPgKC5F2XhZxE6u3K7F8caG57JDc6aVy&index=7&t=1s'),
    ],
    "color-palettes": [
      new Resource('Coolors.co', 'https://coolors.co/?home'),
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
      new Resource('Dog dancing GIF', 'https://tenor.com/view/dance-till-your-dead-dance-dog-cutes-fart-gif-20263804'),
      new Resource('Dog with suspicious look GIF', 'https://tenor.com/view/side-eye-dog-suspicious-look-suspicious-doubt-dog-doubt-gif-23680990'),
      new Resource('Huh cat GIF', 'https://tenor.com/view/cat-huh-cat-huh-etr-gif-15332443943609734737'),
      new Resource('Saitama getting mad GIF', 'https://www.pinterest.ph/pin/53691420536993349/'),
      new Resource('Toothless and Lightfury dancing GIF', 'https://tenor.com/view/nightfury-lightfury-howtotraindragon-howtotraindragon3-toothless-gif-2440374806486612673'),
    ],
    "other-medias": [
      new Resource('1 HOUR Driftveil City - Pokémon / Toothless(Marimba Ringtone)', 'https://www.youtube.com/watch?v=Kug1ITcktJY'),
      new Resource('Random tutorial', 'https://www.youtube.com/watch?v=BbeeuzU5Qc8'),
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
        if (container) {
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
