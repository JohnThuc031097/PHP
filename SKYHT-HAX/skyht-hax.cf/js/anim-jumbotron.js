$("document").ready( function () {

    $(".jumbotron").css("visibility", "visible");

    var animSequence;

    var header = $(".jumbotron h1");
    var desc = $(".jumbotron p");

    switch ( $(".jumbotron").attr('data-anim') )
    {
        case "slide down right":

            animSequence = [
                { e: header, p: "transition.slideDownBigIn", o: { stagger: 2500 } },
                { e: desc, p: "transition.slideRightBigIn", o: { stagger: 2500, sequenceQueue: false } }
            ];

            break;

        case "expand in":

            animSequence = [
                { e: header, p: "transition.expandIn", o: { stagger: 2500 } },
                { e: desc, p: "transition.expandIn", o: { stagger: 2500, sequenceQueue: false } },
            ];

            break;

        case "slide down left":

            animSequence = [
                { e: header, p: "transition.slideDownBigIn", o: { stagger: 2500 } },
                { e: desc, p: "transition.slideLeftBigIn", o: { stagger: 2500, sequenceQueue: false } }
            ];

            break;

        case "slide down up":

            animSequence = [
                { e: header, p: "transition.slideDownBigIn", o: { stagger: 2500 } },
                { e: desc, p: "transition.slideUpBigIn", o: { stagger: 2500, sequenceQueue: false } }

            ];

            break;
    }

    $.Velocity.RunSequence(animSequence);
});