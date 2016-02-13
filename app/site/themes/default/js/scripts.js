$(document).ready(function(){

    var cardsConteiner = $("#cards-conteiner");

    $("#btn-open-send").click(function (){

        $("#send-wrapper").fadeIn(200);

    });

    $("#btn-cancel").click(function (){

        $("#send-wrapper").fadeOut(200);

    });

    $("#cards-stat").click(function (){

        cardsConteiner.fadeIn(300);

        $("body").animate({scrollTop: cardsConteiner.offset().top}, 500);

    });

    $("body").on("mouseenter", ".card", function(){

        var elem = $(this).find(".card-full");
        var w    = $(this).width();

        elem.show()
            .css({"position" : "absolute", "top" : 0})
            .animate({left: -10, width: w + 20}, 100);

        elem.mouseleave(function(){

            $(this).animate({width: w, left: 0}, 200, function(){
                $(this).css({"position" : "inherit"})
                    .hide();
            });

        });

    });

});