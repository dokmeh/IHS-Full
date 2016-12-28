$(document).ready(function () {
    console.log('asdada');
    $('.menu-container').click(function () {
        $(this).toggleClass('open');
    });
    $('.menu-a').click(function () {
        url = $(this).attr('href').replace($('base').attr('href'), '');
        window.history.pushState(null, null, url);
        loadAjax(url);
        $('.menu-container').removeClass('open');
        return false;
    });

});


function home() {
    var canvas    = $('#lines').get(0);
    var context   = canvas.getContext('2d');
    var i         = 0;
    canvas.width  = $('body').width();
    canvas.height = $('body').height();
    context.clearRect(0, 0, canvas.width, canvas.height);
    setTimeout(function () {
        requestAnimationFrame(drawLines);
    }, 1000);
    function drawLines() {
        canvas.width  = $('body').width();
        canvas.height = $('body').height();
        context.translate(0, 0);
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.strokeWidth = 1;
        context.strokeStyle = "#CDCDCD";
        var j               = 0;
        while (j < canvas.height) {
            context.beginPath();
            context.moveTo(canvas.width + (4 * j), canvas.height - (canvas.height * (canvas.width + (4 * j)) / canvas.width));
            context.lineTo(canvas.width - i + (4 * j), canvas.height - (canvas.height * (canvas.width - i + (4 * j)) / canvas.width));
            context.stroke();
            j += 10;
            context.translate(0, -10);
        }
        i += 10;
        if (i < canvas.width + (4 * j) + 10) {
            requestAnimationFrame(drawLines);
        }
        else {
            drawLinesc();
            $(window).resize(drawLinesc);
            return false;
        }
    }

    function drawLinesc() {
        canvas.width  = $('body').width();
        canvas.height = $('body').height();
        context.translate(0, 0);
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.strokeWidth = 1;
        context.strokeStyle = "#CDCDCD";
        var j               = 0;
        while (j < canvas.height) {
            context.beginPath();
            context.moveTo(canvas.width, 0);
            context.lineTo(0, canvas.height);
            context.stroke();
            j += 10;
            context.translate(0, -10);
        }
    }
}

function projects() {
    if ($('body').data('device') == "computer") {
        $('.projects-container').mousewheel(function (e) {
            var sc = ($('.projects-boxes-container')[0].scrollWidth - $('.projects-boxes-container').width()) / 10;
            if (sc < 150) {
                sc = 150;
            }
            $('.projects-boxes-container').stop().animate({scrollLeft: $('.projects-boxes-container').scrollLeft() - (e.deltaY * 150)}, 1000, 'easeOutCubic');
        });
    }
    $('.projects-box').on('mouseenter', function () {
        $('.projects-info h2 a').attr('href', $(this).attr('href')).text($(this).find('.projects-title').text());
        $('.projects-info p').text($(this).find('.projects-details').text());
    }).click(function () {
        window.history.pushState(null, null, $(this).attr('href'));
        loadAjax($(this).attr('href'));
        return false;
    });
}

function project() {
    if ($('body').data('device') == "computer") {
        $('.project-container').mousewheel(function (e) {
            var sc = (this.scrollWidth - $(this).width()) / 10;
            if (sc < 150) {
                sc = 150;
            }
            $(this).stop().animate({scrollLeft: $(this).scrollLeft() - (e.deltaY * sc)}, 1000, 'easeOutCubic');
        });
    }
    //var bh = $('.project-img-box').eq(0).height();
    $('.project-img-box img').imageloader({
        callback: function (ele) {
            //var mt = (bh - $(ele).height()) * 100 / bh;
            //var rmt = Math.floor(Math.random() * mt);
            //$(ele).css('margin-top', rmt + '%').addClass('loaded');
            $(ele).addClass('loaded');
        }
    });
    $('.project-buts a').click(function () {
        window.history.pushState(null, null, $(this).attr('href'));
        loadAjax($(this).attr('href'));
        return false;
    });
    $('.project-img-box img').click(function () {
        $('.project-gallery-bimg').attr('src', $(this).attr('src'));
        $('.project-galery').addClass('show');
    });
    $('.project-gallery-close').click(gclose);
    $('.project-gallery-but.left').click(gprev);
    $('.project-gallery-but.right').click(gnext);
    $('.project-galery').swipe({
        swipeLeft : gnext,
        swipeRight: gprev,
        swipeDown : gclose
    });
    $(window).keyup(function (e) {
        if ($('.project-galery').hasClass('show')) {
            if (e.which == 37) {
                //left arrow
                gprev();
            }
            else if (e.which == 39) {
                //right arrow
                gprev();
            }
            else if (e.which == 27) {
                //Esc arrow
                gclose();
            }
            return false;
        }
    });
}

function gclose() {
    $('.project-galery').removeClass('show');
}

function gprev() {
    var ele  = $('.project-img-box img[src="' + $('.project-gallery-bimg').attr('src') + '"]');
    var prev = $('.project-img-box img').index(ele) - 1;
    if (prev < 0) {
        prev = $('.project-img-box img').length - 1;
    }
    $('.project-gallery-bimg').fadeOut(300, function () {
        $('.project-gallery-bimg').attr('src', $('.project-img-box img').eq(prev).attr('src'));
        $('.project-gallery-bimg').fadeIn(300);
    });
}

function gnext() {
    var ele  = $('.project-img-box img[src="' + $('.project-gallery-bimg').attr('src') + '"]');
    var next = $('.project-img-box img').index(ele) + 1;
    if (next >= $('.project-img-box img').length) {
        next = 0;
    }
    $('.project-gallery-bimg').fadeOut(300, function () {
        $('.project-gallery-bimg').attr('src', $('.project-img-box img').eq(next).attr('src'));
        $('.project-gallery-bimg').fadeIn(300);
    });
}

function contact() {
    if ($('body').data('device') == "computer") {

        $('.contact-container').mousewheel(function (e) {
            var sc = (this.scrollWidth - $(this).width()) / 10;
            if (sc < 150) {
                sc = 150;
            }
            $(this).stop().animate({scrollLeft: $(this).scrollLeft() - (e.deltaY * sc)}, 1000, 'easeOutCubic');
        });
    }
    $.getScript('https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyBGtpj2Q57-TODGzPxigmBeej6f2DTKslA', function () {
        var myLatlng      = new google.maps.LatLng(35.767750, 51.353778);
        var mapOptions    = {
            zoom  : 14,
            center: myLatlng,
        };
        var map           = new google.maps.Map($('#map')[0], mapOptions);
        var contentString = '<div style="direction: ltr; text-align: left; font-family: sans-serif; line-height:1.35; overflow:hidden; white-space:nowrap;">' + '<h4>Shanar design</h4><div>';
        var infowindow    = new google.maps.InfoWindow({
            content: contentString
        });
        var marker        = new google.maps.Marker({
            position: myLatlng,
            map     : map,
            title   : ''
        });
        marker.addListener('mouseover', function () {
            infowindow.open(map, this);
        });
        marker.addListener('mouseout', function () {
            infowindow.close();
        });
        google.maps.event.addListener(marker, 'click', function () {
            infowindow.open(map, marker);
        });
    });
}

function about() {
    if ($('body').data('device') == "computer") {
        $('.about-container').mousewheel(function (e) {
            var sc = (this.scrollWidth - $(this).width()) / 10;
            if (sc < 150) {
                sc = 150;
            }
            $(this).stop().animate({scrollLeft: $(this).scrollLeft() - (e.deltaY * sc)}, 1000, 'easeOutCubic');
        });
    }
}

function awards() {
    if ($('body').data('device') == "computer") {
        $('.awards-container').mousewheel(function (e) {
            var sc = ($('.awards-boxes-container')[0].scrollWidth - $('.awards-boxes-container').width()) / 10;
            if (sc < 150) {
                sc = 150;
            }
            $('.awards-boxes-container').stop().animate({scrollLeft: $('.awards-boxes-container').scrollLeft() - (e.deltaY * sc)}, 1000, 'easeOutCubic');
        });
    }
    $('.awards-box').on('mouseenter', function () {
        $('.awards-info h2').text($(this).find('.awards-title').text());
        $('.awards-project').text($(this).find('.awards-plink').text()).attr('href', $(this).find('.awards-plink').attr('href'));
    }).click(function () {
        $('.awards-info h2').text($(this).find('.awards-title').text());
        $('.awards-project').text($(this).find('.awards-plink').text()).attr('href', $(this).find('.awards-plink').attr('href'));
    });
    $('.awards-project').click(function () {
        window.history.pushState(null, null, $(this).attr('href'));
        loadAjax($(this).attr('href'));
        return false;
    });
}
