import { navAnime } from "./modules.js";

document.addEventListener("DOMContentLoaded",() => {

  const scroll_arrow = document.querySelector('header .arr-dwn');
  scroll_arrow.addEventListener('click',navAnime);

});

var screenWidth = window.innerWidth;
var slides_per_view = 3;

function updateSlidesPerView() {
    if (screenWidth >= 550 && screenWidth <= 800) {
        slides_per_view = 2;
        
    } else if (screenWidth >= 800 && screenWidth <= 1440) {
        slides_per_view = 3;

    } else if (screenWidth <= 499) {
        slides_per_view = 1;

    }
}
window.addEventListener('load',() => {
  screenWidth = window.innerWidth;
  updateSlidesPerView();
  initializeSwiper2();
});
window.addEventListener("resize", () => {
    screenWidth = window.innerWidth;
    updateSlidesPerView();
    initializeSwiper2();
});

// header swiper
function initializeSwiper2() {
    var headerswiper = new Swiper(".mySwiper2", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: slides_per_view,
    slidesPerGroup: 1,
    speed: 800,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    coverflowEffect: {
      rotate: 45,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    
    });
    }
// Typer
const textElement = document.querySelector('.auth-heading span');

const word = 'Founder and CEO.'; 
let currentLetterIndex = 0;
let type_direction = 'forward';

function typeText() {
    if(type_direction == 'forward') {
        if (currentLetterIndex <= word.length) {
            textElement.textContent = word.slice(0, currentLetterIndex);
            currentLetterIndex++;
            setTimeout(typeText, 200); 
        }else{
            type_direction = 'backward';
            setTimeout(typeText, 1800);
        }
    }else if(type_direction == 'backward'){
        if(currentLetterIndex >= 0) {
            textElement.textContent = word.slice(0, currentLetterIndex);
            currentLetterIndex--;
            setTimeout(typeText, 80); 
        }else{
            currentLetterIndex = 0 ;
            type_direction = 'forward';
            typeText();
        }
    }

}

typeText(); 

// typer End
//   Phone 
  const tel = document.querySelector('.buttons .call');
  tel.addEventListener('click', () => {
    let tel_url = `tel: ${phoneNumber}`;
    window.open(tel_url,'_self');
  });

// Whatsapp 

const whtsapp = document.querySelector('.media-icons .bxl-whatsapp');

let phoneNumber = "+923458424484";

whtsapp.addEventListener('click', () => {
  let txt_msg = encodeURIComponent("Assalam-u-alaikum");
  let url = `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${txt_msg}`;

    window.open(url,'_blank');
});

const nav_links = document.querySelector('.links'),
nav_toggle_btn = document.querySelector('.nav__toggle-btn');
const toggler = () => {
  let nav_icon = nav_toggle_btn.firstElementChild;
  if (nav_icon.classList.contains("bx-menu")) {
      nav_icon.classList.replace('bx-menu','bx-x');
      nav_links.style.display = "flex";
  }else{
      nav_icon.classList.replace('bx-x','bx-menu');
      nav_links.style.display = "none";
  }
}

nav_toggle_btn.addEventListener("click",toggler);
