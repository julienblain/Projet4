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