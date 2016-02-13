//$(document).ready(function () {
//
//    var startFrom = 5;
//    var scrH = $(window).height();
//
//    $(window).scroll(function(){
//
//        var inProgress = false;
//        var scro = $(this).scrollTop();
//        var scrHP = $("#cards-conteiner").height();
//        var scrH2 = 0;
//        scrH2 = scrH + scro;
//        var leftH = scrHP - scrH2;
//
//        if(leftH < 200 && !inProgress)
//        {
//
//            inProgress = true;
//
//            $.ajax({
//
//                type: "POST",
//                url: "app/site/modules/ajaxCtr.php",
//                data : {'ajax' : true,'action' : 'loadCards', 'start' : startFrom}
//
//            }).done(function(data){
//
//                if (data)
//                {
//                    $("#cards-conteiner").append(data);
//                }
//
//                inProgress = false;
//                startFrom += 5;
//
//            });
//
//        }
//
//    });
//
//});
