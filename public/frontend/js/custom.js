//..................Owl Carousel Start..................//
$(document).ready(function () {
    var one = $("#one");
    var two = $("#two");

    $("#customNextBtn").click(function () {
        one.trigger("next.owl.carousel");
    });
    $("#customPrevBtn").click(function () {
        one.trigger("prev.owl.carousel");
    });
    one.owlCarousel({
        autoplay: true,
        loop: true,
        dot: true,
        autoplayHoverPause: true,
        autoplaySpeed: 100,
        margin: 10,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 4,
            },
        },
    });

    two.owlCarousel({
        autoplay: true,
        loop: true,
        dot: true,
        autoplayHoverPause: true,
        autoplaySpeed: 100,
        margin: 10,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });
});
//..................Owl Carousel End..................//

//..................Email Send Start..................//
//Submit onclick button
$('#mailSendBtnId').click(function () {
    var contactName    = $('#contactNameId').val();
    var contactMobile  = $('#contactMobileId').val();
    var contactEmail   = $('#contactEmailId').val();
    var contactMessage = $('#contactMessageId').val();
    mailSend(contactName, contactMobile, contactEmail, contactMessage);
});

//Methode
function mailSend(name, mobile, email, message) {

    if(name.length == 0){
        $('#mailSendBtnId').html('Please enter your Name');
        setTimeout(() => {
            $('#mailSendBtnId').html('Send Email');
        }, 2000);
    
    } else if (mobile.length == 0){
        $('#mailSendBtnId').html('Please enter your Mobile');
        setTimeout(() => {
            $('#mailSendBtnId').html('Send Email');
        }, 2000);
    
    } else if (email.length == 0){
        $('#mailSendBtnId').html('Please enter your Email');
        setTimeout(() => {
            $('#mailSendBtnId').html('Send Email');
        }, 2000);

    } else if (message.length == 0){
        $('#mailSendBtnId').html('Please enter your Message');
        setTimeout(() => {
            $('#mailSendBtnId').html('Send Email');
        }, 2000);
    } else {
        
        $('#mailSendBtnId').html('Mail sending....');

    axios.post('/mailSend', {
            name    : name,
            mobile  : mobile,
            email   : email,
            message : message,
        })

        .then(function (resposnse) {
            if(resposnse.status == 200){

                if(resposnse.data == 1){
                    $('#mailSendBtnId').html('Mail send success!');
                    setTimeout(() => {
                        $('#mailSendBtnId').html('Send Email');
                    }, 3000);
                
                } else {
                    $('#mailSendBtnId').html('Mail send fail!');
                    setTimeout(() => {
                        $('#mailSendBtnId').html('Send Email');
                    }, 3000);
                }

            } else {
                $('#mailSendBtnId').html('Mail send fail!');
                setTimeout(() => {
                    $('#mailSendBtnId').html('Send Email');
                }, 3000);
            }
        })

        .catch(function (error) {
            $('#mailSendBtnId').html('Please try again');
            setTimeout(() => {
                $('#mailSendBtnId').html('Send Email');
            }, 3000);
        });
    }

    mailSend();
}
//..................Email Send End..................//
