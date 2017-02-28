$(function () {
    // Review when user change size viewport of browser!
    var _ViewPortW = $(window).width();
    var _ViewPortH = $(window).height();
    var _MyBodyW = _ViewPortW - (_ViewPortW * 1 / 100);
    var _MyBodyH = _ViewPortH - (_ViewPortH * 1 / 100);
    var _MyW = _ViewPortW - (_ViewPortW * 2 / 100);
    var _MyH = _ViewPortH - (_ViewPortH * 2 / 100);

    var _ScreenW = window.screen.availWidth;
    var _ScreenH = window.screen.availHeight;

    var _MyViewPortW = _ScreenW - (_ScreenW * 5 / 100);
    var _MyViewPortH = _ScreenH - (_ScreenH * 10 / 100);

    console.log(_MyViewPortW + " x " + _MyViewPortH);

    console.log("HtmlDoc width : " + $(document).width() + "\nHtmlDoc height: " + $(document).height())
    console.log("ViewPort width : " + _ViewPortW + "\nViewPort height: " + _ViewPortH);
    console.log("Screen width : " + (window.screen.availWidth) + "\nScreen height: " + (window.screen.availHeight));

    //$('body').height(_MyViewPortH);
    //$('header').width(_MyViewPortW);
    //$('section').width(_MyViewPortW);
    //$('footer').width(_MyViewPortW);

    var w = window,
        d = document,
        e = d.documentElement,
        g = d.getElementsByTagName('body')[0],
        x = w.innerWidth  || e.clientWidth  || g.clientWidth,
        y = w.innerHeight || e.clientHeight || g.clientHeight;

    console.log(x + ' x ' + y);

    alertSize();

    function alertSize() {
        var myWidth = 0, myHeight = 0;
        if (typeof (window.innerWidth) == 'number') {
            //Non-IE
            myWidth = window.innerWidth;
            myHeight = window.innerHeight;
        } else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
            //IE 6+ in 'standards compliant mode'
            myWidth = document.documentElement.clientWidth;
            myHeight = document.documentElement.clientHeight;
        } else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
            //IE 4 compatible
            myWidth = document.body.clientWidth;
            myHeight = document.body.clientHeight;
        }

        console.log('Width = ' + myWidth);
        console.log('Height = ' + myHeight);
    }
});