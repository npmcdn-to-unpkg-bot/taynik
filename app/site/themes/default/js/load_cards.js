//$(document).ready(function () {
//
//    var inProgress = false;
//    var startFrom = 5;
//    var scrH = $(window).height();
//
//    $(window).scroll(function(){
//
//        var scro = $(this).scrollTop();
//        var scrHP = $("#cards-conteiner").height();
//        var scrH2 = 0;
//        scrH2 = scrH + scro;
//        var leftH = scrHP - scrH2;
//
//        if(leftH < 200 && !inProgress)
//        {
//
//            $.ajax({
//
//                type: "POST",
//                url: "app/site/modules/ajaxCtr.php",
//                data : {'ajax' : true,'action' : 'loadCards', 'start' : startFrom},
//                beforeSend: function (){
//                    inProgress = true;
//                }
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
