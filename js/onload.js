(function(window){


    function jmpToHeader(){

       var y = 0;
       var headerEle = $("#header-content");
       var hImg = $("#header-img");
        function setWindowScrollY(){
            if(hImg.length >0 && headerEle.length > 0  && hImg.height() > 0 ){
                if($(window).scrollTop()  < (hImg.height() + hImg.offset().top - headerEle.height()) ){
                     y = headerEle.offset().top;
                    $(window).scrollTop(y);
                }
            }else{
                if(headerEle && hImg){
                    setTimeout(setWindowScrollY,20);
                }

            }
        }
        setTimeout(setWindowScrollY,500);
    }

    $(document).ready(function(){
        jmpToHeader();
        $(".post-content a>img").each(function(index,ele){
            $(ele).parent().attr('rel','lightbox')
        }) ;
    });
})(window);