export const send_btn = $('#send'),  toast = $(".toast"), closeIcon = $(".toast .close"), err_head = $(".message .text-1"), err_desc = $(".message .text-2"), err_ico = $(".content").children(".check"), progress = $(".progress");
var toast_time,progress_time,tm_out;

export function toastError() {
    err_ico.removeClass("fa-check").addClass("fa-exclamation").css("background-color","#B00020");
    progress.addClass("error");
    toast.addClass("error");
}

export function toastSuccess() {
    err_ico.removeClass("fa-exclamation").addClass("fa-check").css("background-color","#f07b26");
    progress.removeClass("error");
    toast.removeClass("error");
}

export function showToast() {
    toast.addClass("active");
    progress.addClass("active");

    toast_time = setTimeout(() => {
        toast.removeClass("active");
    }, 5000);

    progress_time = setTimeout(() =>{
        progress.removeClass("active");
    }, 5300);
}
export function success(head,txt) { 
    err_head.text(head);
    err_desc.text(txt);
    send_btn.prop("disabled",true);
    tm_out = setTimeout(() => {
        send_btn.prop("disabled",false);
    },5350);
    if (err_ico.hasClass("fa-exclamation")) { toastSuccess(); }
    showToast();
}
export function err(head,txt) { 
    err_head.text(head);
    err_desc.text(txt);
    send_btn.prop("disabled",true);
    tm_out = setTimeout(() => {
        send_btn.prop("disabled",false);
    },5350);
    if (err_ico.hasClass("fa-check")) { toastError(); }
    showToast();
}

export function clears() {
    clearTimeout(toast_time);
    clearTimeout(progress_time);
    clearTimeout(tm_out);
    send_btn.prop("disabled",false);
    toast.removeClass("active");
    setTimeout(() =>{
        progress.removeClass("active");
    }, 300);
}

  // Navbar JS
  var h = document.querySelector('.header'),
  services = document.querySelector("#srv"),
  services_container = document.querySelector("#srv .srv-container"),
  navbar = document.querySelector('.nav');
  
  services.style.display = "none";
  services_container.style.opacity = '0';
  services_container.style.transition = 'opacity .4s ease';
  let isAnimating = false;

 export function navAnime (){
    if (isAnimating) return;
  
    isAnimating = true;
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
              isAnimating = false;
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
          isAnimating = false;
      }
    }
  