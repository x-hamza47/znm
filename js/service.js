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
    const copyright = document.getElementById("cp-year");
    let cp_year = new Date();
    copyright.textContent = cp_year.getFullYear();

    const greet = document.querySelector(".lt-sub-head h2 span");
    const words = ['Hello','Nǐ hǎo',"Marhaban","Bonjour","Hola"];
    let cli = 0;
    let cwi = 0;
    let type_direction = 'forward';

    function greetings() {
        const word = words[cwi];
        if (type_direction == 'forward') {
            if (cli <= word.length) {
                greet.textContent = word.slice(0, cli);
                cli++;
                setTimeout(greetings, 100);
            } else {
                type_direction = 'backward';
                setTimeout(greetings, 1000);
            }
        } else if (type_direction == 'backward') {
            if (cli >= 0) {
                greet.textContent = word.slice(0, cli);
                cli--;
                setTimeout(greetings, 50);
            } else {

                cli = 0;
                cwi = (cwi + 1) % words.length ;
                type_direction = 'forward';
                greetings();
            }
        }
       
    }
    greetings();


$(document).ready(function() {

    var details = $('details');
    details.on('click', function() {
        $(this).find('summary').css('color','#f07b26')
        details.not($(this)).removeAttr('open').find('summary').css('color','#fff');
    });
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
