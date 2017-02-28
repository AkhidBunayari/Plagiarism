var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
var isFirefox = typeof InstallTrigger !== 'undefined';
var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
var isChrome = !!window.chrome && !isOpera;
var isIE = false || !!document.documentMode;

var _ViewPort_OuterHeight;
var _ViewPort_OuterWidth;
var _ViewPort_InnerHeight;
var _ViewPort_InnerWidth;

$(function () {
    // Review when user change size viewport of browser!
    // Viewport of browser mybe less than more with divice size -> view error
    
    _ViewPortW = $(window).width - 10;
    _ViewPortH = $(window).height();

    if (_Debug || _GeneralSize_Debug) {
        console.log('Screen width : ' + (window.screen.availWidth) + '\n Screen height: ' + (window.screen.availHeight));
        console.log("Outer width: " + window.outerWidth + "\n Outer height: " + window.outerHeight);
        console.log("Inner width: " + window.innerWidth + "\n Inner height: " + window.innerHeight);
        console.log("Client width: " + document.documentElement.clientWidth + "\n Client height: " + document.documentElement.clientHeight);
        console.log('ViewPort width : ' + _ViewPortW + '\n ViewPort height: ' + _ViewPortH);
        console.log('HtmlDoc width : ' + $(document).width() + '\n HtmlDoc height: ' + $(document).height());
        console.log('Window width : ' + $(window).width() + '\n Window height: ' + $(window).height());

        w = window,
        d = document,
        e = d.documentElement,
        g = d.getElementsByTagName('body')[0],
        x = w.innerWidth || e.clientWidth || g.clientWidth,
        y = w.innerHeight || e.clientHeight || g.clientHeight;
        console.log(x + ' x ' + y);

        size = GetViewPortSize();

        console.log('Width  = ' + size.width);
        console.log('Height = ' + size.height);
    }

    if (typeof window.screen.availWidth  !== undefined &&
        typeof window.screen.availHeight !== undefined)
    {
        _ViewPort_OuterHeight = window.screen.availHeight;
        _ViewPort_OuterWidth = window.screen.availWidth;
    }
    else if (typeof window.outer.width  !== undefined &&
             typeof window.outer.height !== undefined)
    {
        _ViewPort_OuterHeight = window.outer.height;
        _ViewPort_OuterWidth  = window.outer.width;
    }

    if (typeof window.innerWidth  !== undefined &&
        typeof window.innerHeight !== undefined)
    {
        _ViewPort_InnerHeight = window.innerHeight;
        _ViewPort_InnerWidth  = window.innerWidth; 
    }
    else if (typeof document.documentElement.clientWidth  !== undefined &&
             typeof document.documentElement.clientHeight !== undefined)
    {
        _ViewPort_InnerHeight = document.documentElement.clientHeight;
        _ViewPort_InnerWidth  = document.documentElement.clientWidth;
    }

    $('body').width(_ViewPortW);
    $('body').height(_ViewPort_InnerHeight - 15);
    //$('header').width(_ViewPortW);
    //$('section').width(_ViewPortW);
    //$('footer').width(_ViewPortW);

    // fix size
    //SetWidth_Percent("#section-content", "#myForm", 60);
    //SetWidth_Percent("#DivTxTArea", "#myForm", 60);
});

/* Set children vertical align middle in parent element */
// Not good
function SetMiddle(element, parent)
{    
    parentH = $(parent).height();
    elementH = $(element).height();
    margin = (parentH - elementH) / 2;

    $(element).css("margin-top", margin);
}

function SetWidth(element, value)
{
    $(element).css("width", value);
}

function SetHeight(element, value)
{
    $(element).css("height", value);
}

function SetWidth_Percent(element, parent, percent) {
    $(element).width(($(parent).width() * percent) / 100);
}

function SetHeight_Percent(element, parent, percent) {
    $(element).height(($(parent).height() * percent) / 100);
}

function GetViewPortSize() {
    myWidth = 0, myHeight = 0;
    if (typeof (window.innerWidth) === 'number') {
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

    return { width: myWidth, height: myHeight };    
}