// Avoid `console` errors in browsers that lack a console.
if (!(window.console && console.log)) {
    (function() {
        var noop = function() {};
        var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'markTimeline', 'table', 'time', 'timeEnd', 'timeStamp', 'trace', 'warn'];
        var length = methods.length;
        var console = window.console = {};
        while (length--) {
            console[methods[length]] = noop;
        }
    }());
}

// Elements to be made the same height under all conditions
BALANCE['same-height-groups'] = {};

// Create an object -- groups -- with key the group # and value the elems in that group
$('.same-height[data-group]').each(function(){
    var $this = $(this);
    if ( !( $this.attr('data-group') in BALANCE['same-height-groups'] ) ) {
        BALANCE['same-height-groups'][ $this.attr('data-group') ] = $('.same-height[data-group="' + $this.attr('data-group') + '"]');
    }
});
BALANCE.makeSameHeight = function() {
    for (var i in BALANCE['same-height-groups']) {
        var targetHeight = 0;

        BALANCE['same-height-groups'][i].height('auto').each(function() {
            var $this = $(this);
            targetHeight = $this.height() > targetHeight ? $this.height() : targetHeight;
            
            $this.height(targetHeight);
        });
    }
}
// Call this a bunch of times -- there's some weird cross-browser issues
$(document).ready(BALANCE.makeSameHeight);
$(window).on('load resize', BALANCE.makeSameHeight);

// ----- Slugify strings (a la WordPress) for Services page
BALANCE.slugify = function(string) {
    return string.replace(/[^a-zA-Z0-9-]/g, '-').toLowerCase().replace(/--+/g, '-')
}

// popup links
$('body').on('click', '.popup', function(e){
  e.preventDefault();
  window.open($(this).attr('href'),'share','height=420,width=480,fulscreen=no,location=yes,statusbar=no,toolbar=no,resizeable=yes',false);
});

// Cookies
function cGet(name){
    var b, c = document.cookie.split("; "), num = c.length; 
    do { b = c[num - 1].split("="); 
        if (b[0] === name) { return b[1] || ''; } 
    } while(--num); return null;
}
function cSet(name, v, exp) { 
    document.cookie = name+"="+v+"; path=/; domain="+window.location.hostname+";"+((exp)?"expires="+new Date(new Date().getTime()+(exp*864e5)).toGMTString():'');
}