  // Navbar JS
  var h = document.querySelector('.header'),
  scroll_arrow = document.querySelector('header .arr-dwn'),
  services = document.querySelector("#srv"),
  services_container = document.querySelector("#srv .srv-container"),
  navbar = document.querySelector('.nav');
  
  
  services.style.display = "none";
  services_container.style.opacity = '0';
  services_container.style.transition = 'opacity .4s ease';
  
  
  
   scroll_arrow.addEventListener('click',function(){
      h.classList.toggle('active');
  
      if ( h.classList.contains('active') ) {
          h.style.borderRadius = '10px';
          navbar.style.borderRadius = '8px 8px 0 0';
          h.style.transform = 'scaleX(.95)';
          services.style.display ="flex";
  
  
          setTimeout(() => {
              h.style.top = '7px';
              h.style.height = 'calc(100vh - 50px)';
          }, 500);
  
          setTimeout(() => {
              services_container.style.opacity = '1';
          }, 900);
  
          
      } else {
          setTimeout(() => {
              navbar.style.borderRadius = '0';
              h.style.borderRadius = '0';
              h.style.transform = 'scaleX(1)';
          }, 700);
          services_container.style.opacity = '0';
          h.style.top = '0';
          services.style.display = "none";
          h.style.height = '';
      }
  
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
