var sliderBook = {
    bookWidth : 0,
    
    lastChildLeft : function () {
        this.bookWidth = document.getElementById('post-index-container').offsetWidth;
        var lastChildOffset = document.getElementById('postContent').lastChild.offsetLeft;
        
        if(lastChildOffset >= this.bookWidth) {
           var firstChildOffset = document.getElementById('postContent').firstChild.offsetLeft;
            var offsetWidth = -(this.bookWidth) + firstChildOffset ;
            
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
        }
    },
    
    firstChildLeft : function () {
         this.bookWidth = document.getElementById('post-index-container').offsetWidth;
         var firstChildOffset = document.getElementById('postContent').firstChild.offsetLeft;
        
        if(firstChildOffset < 0) {
            var offsetWidth = this.bookWidth + firstChildOffset;
            
             $('#postContent').children('p').fadeOut(500)
                .queue(function (next) {
                    $(this).css("left", offsetWidth);
                    next();
                })
                .queue(function (next) {
                    $(this).fadeIn(1000);
                    next();
            });   
        }
    }
}

/*evenement*/
$("#book-after").click(function() {
   sliderBook.lastChildLeft();
});

$("#book-previous").click(function() {
    sliderBook.firstChildLeft();
});

