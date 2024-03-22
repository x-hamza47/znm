import * as res from "./modules.js";
$(document).ready(function () {
     function checkEmail(email){
        const emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return emailPattern.test(email);
    }
     function checkPhone(phone){
        let phonePattern = /^(03\d{2}-?\d{7}|\(0\d{2}\)-?\d{7}|\+92\d{10})$/;
        return phonePattern.test(phone);
    }
    
    res.closeIcon.on("click",res.clears);

// Form Submission
    let errors = {
        "fields" : "Please fill out all required fields.",
        "email" : "Please enter a valid email.",
        "number" : "Please enter a valid number."
      };
     
    res.send_btn.on("click",function(e){
        e.preventDefault();
        let sndr_name = $("#name").val();
        let sndr_phone = $("#phone").val();
        let sndr_email = $("#email").val();
        let sndr_msg = $("#msg").val();

    if (sndr_name == "" || sndr_email == "" || sndr_msg == "") {

        res.err("Error",errors.fields);

    }else if(!checkEmail(sndr_email) ) {

        res.err("Error",errors.email);


    } else if(!checkPhone(sndr_phone) && sndr_phone != "") {

        res.err("Error",errors.number);

    } else {
         
        $.ajax({
            url: "./php/send-message.php",
            type: "POST",
            data: {
            name : sndr_name,
            phone : sndr_phone,
            email : sndr_email,
            msg : sndr_msg
            },
            dataType: "json", 
            success: function (response) {
            if(response.status == true) {
                res.success("Successfull",response.message);
                $('#contact_form').trigger('reset').find('input,textarea').removeClass('filled');
            } else {
                res.err("Error",response.message);
            }
        }
      });//Ajax End
    }
    });

    // Projects

    function loadCards() {
            $.ajax({
            type: "GET",
            url: "./php/fetch-projects.php",
            success: function (response) {
                $("#pro-container").html(response);
                console.log(response);
            }
        });
    }
    loadCards();



});