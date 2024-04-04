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
    // Removing animation from previous content elements
    const prevContentElements = sliderImgs[currImg].querySelectorAll(".content h2, .content a");
    prevContentElements.forEach(element => {
        element.classList.remove("current-img");
    });

    // Adding class to content elements of current slider
    const currContentElements = sliderImgs[nextImg].querySelectorAll(".content h2, .content a");
    currContentElements.forEach(element => {
        element.classList.add("current-img");
    });

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