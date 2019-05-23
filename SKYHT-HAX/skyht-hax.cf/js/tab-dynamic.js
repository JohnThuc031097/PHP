$("document").ready( function () {

    $('.tab-dynamic').each(function(){

        var tabItems = $(".tab-dynamic-item", this)

        $(".tab-dynamic-item:first", this).show();

        $("ul:first-child li", this).click(function() {

            var colorThemeCurrent = $(this).attr('class').split(' ')[0];

            var itemOld = $(this).parent().find('li.tab-active');

            var colorThemeOld = $(itemOld).attr('class').split(' ')[0];

            $(itemOld).removeClass("tab-active");
            $(itemOld).removeClass(colorThemeOld + "-active");

            $(this).addClass("tab-active");
            $(this).addClass(colorThemeCurrent + "-active");

            tabItems.hide();

            var activeTab = $(this).attr("rel");

            $("#"+activeTab).fadeIn("fast");
        });
    });
});
