const form = document.querySelector('form'),
user_field = form.querySelector('.user-field'),
user_inp = form.querySelector('.user-field input');

const  usr_err = form.querySelector('.username-error .error-text'),
pass_err = form.querySelector('.pass-error .error-text');

const checkUser = () => {

    if (user_inp.value == "") {
        user_field.classList.add('invalid');
        usr_err.innerText = "Username required";
    } else {
        user_field.classList.remove('invalid');
    }
};
const pass_field = form.querySelector('.pass-field'),
pass_inp = form.querySelector('.pass-field input'),
chng_pass_field = form.querySelector('.chng-pass-field'),
chnge_pass_inp = form.querySelector('.chng-pass-field input');

const checkPass = () => {
    if (pass_inp.value == "" || chnge_pass_inp.value == "") {
        pass_field.classList.add('invalid');
        chng_pass_field.classList.add('invalid');
    } else {
        pass_field.classList.remove('invalid');
        chng_pass_field.classList.remove('invalid');
    }
};



// show hide

const show_hide = document.querySelector("#password__toggler"),
toggler_label = document.querySelector("label[for='password__toggler']");

    show_hide.addEventListener("change", () => {
        if (show_hide.checked) {
            pass_inp.type = "text";
            chnge_pass_inp.type = "text";
            toggler_label.textContent = "Hide password";
        }else{
            pass_inp.type = "password";
            chnge_pass_inp.type = "password";
            toggler_label.textContent = "Show password";
        }
    });

    const sub_btn = document.querySelector(".btn");
    
form.addEventListener("submit",(e) => {
    checkUser();
    checkPass()
    if (!user_field.classList.contains('invalid') && !pass_field.classList.contains('invalid') && !chng_pass_field.classList.contains('invalid')) {
        form.submit(); 
    }else{
        e.preventDefault();
    }
});

$(document).ready(function(){
    
let log_err = $(".login-error");

setTimeout(() => {
    log_err.fadeOut(3000,function(){
        $(this).remove();
    });
}, 4000);
});



