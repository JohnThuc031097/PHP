$("document").ready( function () {

    $(".square").hover(function(){

        var animSequence = [];

        var iconItem = $(this).find("span.icon");
        var iconType = iconItem.attr('class').split(' ')[1];

        var firstSequence = [];


        switch (iconType)
        {
            case "glyphicon-star":
            case "icon-lifebuoy":
            case "icon-cog":
                animSequence = [

                    { e: iconItem, p: { rotateZ: 360 }, o: { duration: 1000 } },
                    { e: iconItem, p: { rotateZ: 0 }, o: { duration: 0 } },
                ];

                break;

            case "icon-loop3":
                animSequence = [

                    { e: iconItem, p: { rotateZ: -360 }, o: { duration: 1000 } },
                    { e: iconItem, p: { rotateZ: 0 }, o: { duration: 0 } },
                ];

                break;

            case "icon-earth":
            case "icon-shield2":
            case "icon-trophy4":
            case "icon-bubble-quote":
            case "icon-exit3":

                animSequence = [
                    { e: iconItem, p: { rotateY: 360 }, o: { duration: 1000 } },
                    { e: iconItem, p: { rotateY: 0 }, o: { duration: 0 } }
                ];
                break;
            case "coin-dollar":

                animSequence = [
                    { e: iconItem, p: { rotateY: 360 }, o: { duration: 1000 } },
                    { e: iconItem, p: { rotateY: 0 }, o: { duration: 0 } }
                ];
                break;
            case "glyphicon-user":
            case "icon-design":
            case "icon-drawer-in":

                animSequence = [
                    { e: iconItem, p: { rotateX: 360 }, o: { duration: 1000 } },
                    { e: iconItem, p: { rotateX: 0 }, o: { duration: 0 } }
                ];
                break;
        }

        var finalSequence = firstSequence.concat(animSequence);

        $.Velocity.RunSequence(finalSequence);

    }, function(){
    });
});