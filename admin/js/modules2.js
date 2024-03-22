export const  toast = $(".toast-1"), closeIcon = $(".toast-1 .close"), err_head = $(".message .text-1"), err_desc = $(".message .text-2"), err_ico = $(".content .check"), progress = $(".progress");
var toast_time,progress_time,tm_out;

export function toastError() {
    err_ico.removeClass("fa-check").addClass("fa-exclamation").css("background-color","#B00020");
    progress.addClass("error");
    toast.addClass("error");
}

export function toastSuccess() {
    err_ico.removeClass("fa-exclamation").addClass("fa-check").css("background-color","green");
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
export function scs(head,txt) { 
    err_head.text(head);
    err_desc.text(txt);
    if (err_ico.hasClass("fa-exclamation")) { toastSuccess(); }
    showToast();
}

export function err(head,txt) { 
    err_head.text(head);
    err_desc.text(txt);
    if (err_ico.hasClass("fa-check")) { toastError(); }
    showToast();
}

export function clears() {
    clearTimeout(toast_time);
    clearTimeout(progress_time);
    toast.removeClass("active");
    setTimeout(() =>{
        progress.removeClass("active");
    }, 300);
}