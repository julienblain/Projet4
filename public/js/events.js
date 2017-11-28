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

$("#btn-reported").click(function() {
    $("#btn-reported").hide();
    $("#reported-form").slideToggle(500);
});
