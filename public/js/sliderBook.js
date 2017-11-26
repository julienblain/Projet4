var sliderBook = {
    click : 0,
    bookWidth : 0,
    nbOffset : 0,
    
    txtOffset : function () {
        var offsetWidth = -(sliderBook.click * sliderBook.bookWidth);
        
        /*QUESTION pourquoi faut il doublé le temps du fadeIn()*/
        $('#postContent').children('p').fadeOut(500)
            .queue(function (next) {
                $(this).css("left", offsetWidth);
                next();
            })
            .queue(function (next) {
                $(this).fadeIn(1000);
                next();
        });
     
    },
    
    totalNbOffset : function () {
        /*on recupere les dimensions qui peuvent changer suivant le media query*/
        sliderBook.bookWidth = document.getElementById("post-index").offsetWidth;
        var contentBookWidth = document.getElementById("post-index-container").offsetWidth;
        
        /*on arrondi le nb en valeur sup de click possible vers la droite*/
        sliderBook.nbOffset = Math.ceil(contentBookWidth / sliderBook.bookWidth);
    }
};

/*evenement*/
$("#book-after").click(function() {
    
    sliderBook.totalNbOffset();
    
    if(sliderBook.click === 0) {
        sliderBook.click ++;
        
        sliderBook.txtOffset();
    }
    else if((sliderBook.click >0) && (sliderBook.click < sliderBook.nbOffset)) {
         sliderBook.click ++;
        
        sliderBook.txtOffset();
    }
});

$("#book-previous").click(function() {
    sliderBook.totalNbOffset();
    if(sliderBook.click > 0) {
        sliderBook.click --;
        sliderBook.txtOffset();
    }
});