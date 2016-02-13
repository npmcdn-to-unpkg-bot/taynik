$(document).ready(function () {

    var action = false;
    var lastCard   = $(".card").last();
    var countCards = $(".card").length;
    var cardContainer = $("#cards-conteiner");

    $(window).scroll(function(){

        var cardPos = lastCard.offset().top - $(window).height()+220;

        if ($(this).scrollTop() >= cardPos && !action && cardContainer.is(":visible"))
        {

            action = true;

            $.ajax({
                type: "POST",
                url : "app/site/modules/ajaxCtr.php",
                data: {'action' : 'loadCards', "start" : countCards}
            }).done(function(data){
               if(data)
               {
                   cardContainer.append(data);
                   lastCard   = $(".card").last();
                   countCards = $(".card").length;
                   action = false;
               }
            });

        }

    });

});
