/* menu de navigation*/
$("#nav-container").click(
    function() {
        $("#nav-public").slideToggle(300);
    }

);

$("#btn-comment").click(function () {
    $("#form-comment").toggle(500);
});

$("#btn-readComment").click(function() {
    $("#comments-container").toggle(500);
});

$(".comment-btn-reported").click(function() {
    var form = $(this).siblings(".reported-form");
    $(this).hide();
    form.slideToggle(500);
});

/* notification */
if(document.getElementsByClassName("notification")) {
   $(".notification").delay(5000).fadeOut('slow');
}

/* initialisation de tinymce and modification*/
/* h1 remove */
 tinymce.init({
        selector: ' #post-content',
        block_formats: 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6; Preformatted=pre'

    });







/*invisible recaptcha management*/
function validateMail(mail) {
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(regex.test(mail.value)){
        return true;
    } else {
        return false;
    }
};

function onload() {
        var element = document.getElementById('btn-form-submit');
        element.onclick = validate;
};


function validate(event) {
    event.preventDefault();
    var mail = document.getElementById('form-comment-email');

    if(validateMail(mail) == false) {
        $("#form-comment-email").css("border", "2px solid red");
        alert('Veuillez entrer un mail valide.');
    }
    else if (
        (document.getElementById('form-comment-textarea').value.length <= 2)
        || (document.getElementById('form-comment-textarea').value.length > 500) ){
            $("#form-comment-textarea").css('border', '2px solid red');
            alert('Veuillez entrer un commentaire de moins de 500 mots ou un mot de plus de deux lettres');
    }
    else {
        grecaptcha.execute();
    };

};

function SubmitRegistration(data) {
    document.getElementById("form-comment").submit();
};

 onload();
