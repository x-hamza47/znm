document.addEventListener("DOMContentLoaded",() => {
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

// links color
var sections = document.querySelectorAll('section');
var navBar = document.querySelectorAll('header nav a');

window.onscroll = () =>  {
    let top= window.scrollY;
    sections.forEach(sec => {
        offset = sec.offsetTop - 150;
        height = sec.offsetHeight;
        id = sec.getAttribute('id');

        if(top >= offset && top < offset + height){
            navBar.forEach(links => {
                links.classList.remove('active');
                document.querySelector('header nav a[href*= '  + id + ' ]').classList.add('active');
            });
        };
      
    });
};


// Slider Js
const sliders = document.querySelectorAll(".slider");
const interval = 7000;
const animDuration = 600;

for (let i = 0; i < sliders.length; ++i) {
  const slider = sliders[i];
  const dots = slider.querySelector(".dots");
  const sliderImgs = slider.querySelectorAll(".img");

  let currImg = 0;
  let prevImg = sliderImgs.length - 1;
  let intrvl;
  let timeout;

  // Creates dots and add listeners to them
  for (let i = 0; i < sliderImgs.length; ++i) {
    const dot = document.createElement("div");
    dot.classList.add("dot");
    dots.appendChild(dot);
    dot.addEventListener("click", dotClick.bind(null, i), false);
  }

  const allDots = dots.querySelectorAll(".dot");
  allDots[0].classList.add("active-dot");

  sliderImgs[0].style.left = "0";
  timeout = setTimeout(() => {
    animateSlider();
    sliderImgs[0].style.left = "";
    intrvl = setInterval(animateSlider, interval);
  }, interval - animDuration);   


  function animateSlider(nextImg, right) {
    if (!nextImg)
      nextImg = (currImg + 1 < sliderImgs.length) ? currImg + 2 : 1;

    --nextImg;
    sliderImgs[prevImg].style.animationName = "";

    if (!right) {
      sliderImgs[nextImg].style.animationName = "leftNext";
      sliderImgs[currImg].style.animationName = "leftCurr";
    } 
    else {
      sliderImgs[nextImg].style.animationName = "rightNext";
      sliderImgs[currImg].style.animationName = "rightCurr";
    }

    prevImg = currImg;
    currImg = nextImg;

    currDot = allDots[currImg];
    currDot.classList.add("active-dot");
    prevDot = allDots[prevImg];
    prevDot.classList.remove("active-dot");
  }

  function dotClick(num) {
    if (num == currImg)
    return false;
   
    clearTimeout(timeout);
    clearInterval(intrvl);

    if (num > currImg)
      animateSlider(num + 1);
    else
      animateSlider(num + 1, true);

    intrvl = setInterval(animateSlider, interval);
  }

  // Previous Button Click Event
const prevSlide = document.querySelector(".prev");
prevSlide.addEventListener("click" , () =>{

    clearTimeout(timeout);
    clearInterval(intrvl);

    const prevIndex = (currImg - 1 >= 0) ? currImg - 1 : sliderImgs.length - 1;
    animateSlider(prevIndex + 1, true);
    intrvl = setInterval(animateSlider, interval);
});

  // Next Button Click Event
const nextSlide = document.querySelector(".next");
nextSlide.addEventListener("click", () => {

    clearTimeout(timeout);
    clearInterval(intrvl);

    const nextIndex = (currImg + 1 < sliderImgs.length) ? currImg + 1 : 0;
    animateSlider(nextIndex + 1);
    intrvl = setInterval(animateSlider, interval);
  });
  
}
  
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