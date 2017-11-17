
/*-----------------------------------------
Navigation scripts
 --------------------------------------*/

(function($){
  $(function(){
    $('.button-collapse').sideNav();
    $('.parallax').parallax();

  }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function(){
  // MODAL
  $('.modal').modal();
  // DROPDOWNS
  $(".dropdown-button").dropdown(
    {
      belowOrigin: true
    }
  );
  // TABS
  $('ul.tabs').tabs();
  // SCROLLSPY
  $('.scrollspy').scrollSpy();
  //SIDENAV
  $(".button-collapse").sideNav();
});

/**
 * Listen to scroll to change header opacity class
 */
function checkScroll(){
    var position = $(window).scrollTop(); // should start at 0

    var startY1 = $('nav').height() * 0;
    var startY2 = $('nav').height() * 8;
    var startY3 = $('nav').height() * 6;
    var startY4 = $('nav').height() * 12;

/*
    if(position > startY1){
        $('nav').removeClass("scrolled-up").removeClass("scrolled-down");
    }

    if(position > startY3){
        $('nav').removeClass("scrolled-down");
    }

    if(position > startY2){
        $('nav').addClass("scrolled-up");
    }

    if(position > startY4){
        $('nav').removeClass("scrolled-up").addClass("scrolled-down");
    }
    */
}

if($('nav').length > 0){
    $(window).on("scroll load resize", function(){
        checkScroll();
    });
}

var toggle=0;
function noscroll(){
    window.scrollTo( 0, 0);
}

$(document).ready(function() {
    $('.open-menu').on('click', function() {
        if(toggle==1) {
            $('nav').removeClass("scrolled-up").addClass("scrolled-down");
            $('#nav-icon1').addClass('open');
            $('.overlay').addClass('open');
            window.addEventListener('scroll', noscroll);
            toggle=0;
        }
        else
        {
            $('.overlay').removeClass('open');
            $('#nav-icon1').removeClass("open");
            window.removeEventListener('scroll', noscroll);
            $('nav').removeClass("scrolled-down");
            toggle=1;
        }
    });

    $('.close-menu').on('click', function() {
        $('.overlay').removeClass('open');
        $('#nav-icon1').removeClass('open');
        window.removeEventListener('scroll', noscroll);
        $('nav').removeClass("scrolled-down");
    });
});

$(document).ready(function(){
    $('#nav-icon1').click(function(){
        $(this).toggleClass('open');
    });
});

/*-----------------------------------------
 Filterizr
 --------------------------------------*/

$(function() {
    //Initialize filterizr with default options
    $('.filtr-container').filterizr('setOptions', {layout: 'packed'});

});


/*-----------------------------------------
 Font scripts
 --------------------------------------

$(function() {

    var $quote = $(".blogitems h3")[0];

    var $numWords = $quote.text().split(" ").length;

    if (($numWords >= 1) && ($numWords < 2)) {
        $quote.css("font-size", "3rem");
    }
    else if (($numWords >= 10) && ($numWords < 3)) {
        $quote.css("font-size", "2.2rem");
    }
    else if (($numWords >= 20) && ($numWords < 8)) {
        $quote.css("font-size", "1.8rem");
    }
    else if (($numWords >= 30) && ($numWords < 10)) {
        $quote.css("font-size", "1.2rem");
    }
    else {
        $quote.css("font-size", "1.2rem");
    }

});*/

var TxtType = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function() {
        that.tick();
    }, delta);
};

window.onload = function() {
    var elements = document.getElementsByClassName('typewrite');
    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
};

$(function() {
var userFeed = new Instafeed({
    get: 'user',
    userId: '2244632210',
    accessToken: '2244632210.1677ed0.59506ed28fc34e49a948781a426e2650',
    template: '<div class="media-loop-grid media-loop-grid--width-borderless media-loop-grid--origin-center"> ' +
    '<div class="media-loop__block media-loop__block--image media-loop__block--size-small js-does-build"> ' +
    '<figure> ' +
    '<div style="padding-bottom: 0.5%"> ' +
    '<a href="{{link}}">' +
    '<img class="responsive-img" src="{{image}}" alt="{{caption}}"> ' +
    '</a>' +
    '</div> ' +
    '</figure> ' +
    '</div> ' +
    '</div>',
    resolution: 'standard_resolution',
    limit: 6
});
userFeed.run();
});



jQuery(function($){
    $('.misha_loadmore').click(function(){

        var button = $(this),
            data = {
                'action': 'loadmore',
                'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
                'page' : misha_loadmore_params.current_page
            };

        $.ajax({
            url : misha_loadmore_params.ajaxurl, // AJAX handler
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.text('Loading...'); // change the button text, you can also add a preloader image
            },
            success : function( data ){
                if( data ) {
                    button.text( 'More posts' ).prev().before(data); // insert new posts
                    misha_loadmore_params.current_page++;

                    if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page )
                        button.remove(); // if last page, remove the button
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
    });
});

$(document).ready(function() {
    $('.js-newsletter-signup__input').keydown(function(event) {
        if (event.keyCode == 13) {
            this.form.submit();
            return false;
        }
    });

});


var sidebar = document.getElementById('sidebar');
Stickyfill.add(sidebar);


