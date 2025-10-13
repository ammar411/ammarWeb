/*==============================================================*/
// Contact Form JS (Laravel Version)
/*==============================================================*/
(function ($) {
    "use strict"; 

    $("#contactForm").on("submit", function (event) {
        event.preventDefault(); // stop normal form submit
        submitForm();
    });

    function submitForm(){
        // Collect form values
        var name = $("#name").val();
        var email = $("#email").val();
        var phone_number = $("#phone_number").val();
        var subject = $("#subject").val();
        var message = $("#message").val();

        $.ajax({
            type: "POST",
            url: "/send-contact", // ✅ Laravel route
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // ✅ CSRF token
                name: name,
                email: email,
                phone_number: phone_number,
                subject: subject,
                message: message
            },
            success: function (response) {
                formSuccess();
                submitMSG(true, "Message Submitted!");
            },
            error: function (xhr) {
                formError();
                submitMSG(false, "Something went wrong. Try again.");
            }
        });
    }

    function formSuccess(){
        $("#contactForm")[0].reset();
        submitMSG(true, "Message Submitted!");
    }

    function formError(){
        $("#contactForm")
            .removeClass()
            .addClass('shake animated')
            .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $(this).removeClass();
            });
    }

    function submitMSG(valid, msg){
        var msgClasses = valid ? 
            "h4 text-left tada animated text-success" : 
            "h4 text-left text-danger";

        // If you don’t already have a <div id="msgSubmit"></div>, add it below your form
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
}(jQuery));
