import { navAnime } from "./modules.js";

document.addEventListener("DOMContentLoaded",() => {

  const scroll_arrow = document.querySelector('header .arr-dwn');
  scroll_arrow.addEventListener('click',navAnime);

});

// links color
var sections = document.querySelectorAll('section');
var navBar = document.querySelectorAll('header nav a');

window.onscroll = () =>  {
    let top= window.scrollY;
    sections.forEach(sec => {
      let offset = sec.offsetTop - 150;
      let height = sec.offsetHeight;
      let id = sec.getAttribute('id');

        if(top >= offset && top < offset + height){
            navBar.forEach(links => {
                links.classList.remove('active');
                let targetLink = document.querySelector('header nav a[href*= '  + id + ' ]');
                if(targetLink){
                  targetLink.classList.add("active");
                }
            });
        };
      
    });
};

  
  const name_restriction = document.querySelector(".inp_grp #name");
  
  name_restriction.addEventListener("keypress",function (e) {
    let maxLength = 50;
    let inputText = this.value;
    
    if (inputText.length >= maxLength) {
      e.preventDefault();
    }
  });
  const num_restriction = document.querySelector('#phone');
  
  num_restriction.addEventListener("keypress",function(e){
    let key = e.key;
    if (/^[a-zA-Z]$/.test(key)) {
      e.preventDefault(); 
    }
    let maxLength = 14;
    let inputText = this.value;
    
    if (inputText.length > maxLength) {
      e.preventDefault();
    }
  });
  
  const cont_msg = document.querySelector('.msg_grp #msg');
  
  cont_msg.addEventListener("keypress",function(e){
    let maxLength = 500;
    let inputText = this.value;
    
    if (inputText.length >= maxLength) {
      if (e.key === "Backspace" || e.key === "Delete" || e.key === "ArrowLeft" || e.key === "ArrowRight") {
        return;
      }
      e.preventDefault();
    }
  });
  


// Media Query
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
  initializeSwiper();
  initializeSwiper2();
});
window.addEventListener("resize", () => {
    screenWidth = window.innerWidth;
    updateSlidesPerView();
    initializeSwiper();
    initializeSwiper2();
});

// Initialize Swiper
function initializeSwiper() {
  var swiper = new Swiper(".mySwiper", {
      slidesPerView: slides_per_view,
      spaceBetween: 30,
      slidesPerGroup: 1,
      speed: 800,
      pagination: {
          el: ".swiper-pagination",
          clickable: true,
      },
      navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
      },
  });
}

const copyright = document.getElementById("cp-year");
let cp_year = new Date();
copyright.textContent = cp_year.getFullYear();

// header swiper
function initializeSwiper2() {
new Swiper(".mySwiper2", {
effect: "coverflow",
grabCursor: true,
centeredSlides: true,
slidesPerView: slides_per_view,
// autoplay: {
//   delay: 2500,
//   disableOnInteraction: false,
// },
slidesPerGroup: 1,
speed: 800,
coverflowEffect: {
  rotate: 45,
  stretch: 0,
  depth: 100,
  modifier: 1,
  slideShadows: true,
},
});
}
const form = document.querySelector("form");

form.addEventListener('change',(event) =>{
  const target = event.target;

  if (target.matches('.inp_grp input') || target.matches('.msg_grp textarea')) {
    if (target.value !== '') {
      target.classList.add('filled');
    } else {
      target.classList.remove('filled');
    }
  }
});

// });
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

// Carousel
const next_btn = document.getElementById("next"),
prev_btn = document.getElementById("prev"),
carousel = document.querySelector(".carousel"),
list = document.querySelector(".carousel .list"),
thumbnail = document.querySelector(".carousel .thumbnail");


next_btn.onclick = () => {
    showSlider('next');
}
prev_btn.onclick = () => {
    showSlider('prev');
}
let timer = 3000;
let time_out;
let autoplay = 7000;
let autoRun = setTimeout(() => {
    next_btn.click();
}, autoplay);

function showSlider(type) {  
    let item_slider = document.querySelectorAll(".carousel .list .item");
    let item_thumb = document.querySelectorAll(".carousel .thumbnail .item");

    if (type === 'next') {
        list.appendChild(item_slider[0]);
        thumbnail.appendChild(item_thumb[0]);
        carousel.classList.add('next');
    }else{
        let pos_last_item = item_slider.length - 1;
        list.prepend(item_slider[pos_last_item]);
        thumbnail.prepend(item_thumb[pos_last_item]);
        carousel.classList.add('prev');
    }

    clearTimeout(time_out);
    time_out = setTimeout(() =>{
        carousel.classList.remove('next');
        carousel.classList.remove('prev');
    },timer);

    clearTimeout(autoRun);
    autoRun = setTimeout(() => {
        next_btn.click();
    }, autoplay);

}
