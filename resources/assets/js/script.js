$(document).ready(function () {

    window[$('body').attr('data-page')]();

    $('.menu-a').click(function () {
        url = $(this).attr('href').replace($('base').attr('href'), '');
        $('body').attr('data-page', $(this).attr('data-page'));
        window.history.pushState(null, null, url);

        loadAjax(url);
        return false;
    });
    $(window).on('popstate', function () {
        url = window.location.href.replace($('base').attr('href'), '');
        loadAjax(url);
    });
});

function loadAjax(url) {
    $.ajax({
        url       : url,
        type      : 'get',
        cache     : false,
        beforeSend: function (xhr) {
            $('.loading').removeClass('hide-loading');
            setTimeout(function functionName() {
                $('.inner-ajax *').off();
            }, 1000);
            $(window).off('resize');

            //$('.inner-ajax').html('<div class="loading"></div>');
        },
        success   : function (result, status, xhr) {
            setTimeout(function () {
                $('.inner-ajax').html(result);
                $('.loading').addClass('hide-loading');
            }, 1000);
            $('body').attr('data-page', url);

            if (result.page == "home") {
                $('.enter-container').addClass('show');
            } else {
                $('.enter-container').removeClass('show');
            }

            window[$('body').attr('data-page')]();

        },
        error     : function (req, err) {
            console.log('my message' + err);
        }
    });
}

function home() {
    $('.enter-container').addClass('show');
    $('.enter-link').click(function () {
        window.history.pushState(null, null, $(this).attr('href'));
        loadAjax($(this).attr('href'));
        return false;
    });
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
        } else {
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
    $('.projects-box').click(function () {
        window.history.pushState(null, null, $(this).attr('href'));
        loadAjax($(this).attr('href'));
        return false;
    });
    $('.projects-category-list li').click(function functionName() {
        var cat = $(this).attr('data-cat');
        if (cat == 'all') {
            $('.projects-category-list li').removeClass('cat-hide');
            $(this).addClass('cat-hide');
            $('.projects-boxes').removeClass('pr-hide');
        } else {

            $('.projects-category-list li').removeClass('cat-hide');
            $(this).addClass('cat-hide');
            $('.projects-boxes').addClass('pr-hide');
            $('.projects-boxes[data-cat="' + cat + '"]').removeClass('pr-hide');
        }
    })
}

function project() {

    $('.project-fullscreen-arrow').click(function () {
        if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
            var element = $('.project-gallery').get(0);
            if (element.requestFullscreen) {
                element.requestFullscreen();
            } else if (element.mozRequestFullScreen) {
                element.mozRequestFullScreen();
            } else if (element.webkitRequestFullscreen) {
                element.webkitRequestFullscreen();
            } else if (element.msRequestFullscreen) {
                element.msRequestFullscreen();
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    });
    $('.slide.project-img-box').first().addClass('show');
    // if ($('body').data('device') == "computer") {
    //     $('.project-container').mousewheel(function (e) {
    //         var sc = (this.scrollWidth - $(this).width()) / 10;
    //         if (sc < 150) {
    //             sc = 150;
    //         }
    //         $(this).stop().animate({scrollLeft: $(this).scrollLeft() - (e.deltaY * sc)}, 1000, 'easeOutCubic');
    //     });
    // }
    //var bh = $('.project-img-box').eq(0).height();
    // $('.project-img-box img').imageloader({
    //     callback: function (ele) {
    //         //var mt = (bh - $(ele).height()) * 100 / bh;
    //         //var rmt = Math.floor(Math.random() * mt);
    //         //$(ele).css('margin-top', rmt + '%').addClass('loaded');
    //         $(ele).addClass('loaded');
    //     }
    // });
    // $('.project-buts a').click(function () {
    //     window.history.pushState(null, null, $(this).attr('href'));
    //     loadAjax($(this).attr('href'));
    //     return false;
    // });
    // $('.project-img-box img').click(function () {
    //     $('.project-gallery-bimg').attr('src', $(this).attr('src'));
    //     $('.project-galery').addClass('show');
    // });
    $('.project-gallery-close').click(gclose);
    $('.project-left-arrow').click(gprev);
    $('.project-right-arrow').click(gnext);
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
            } else if (e.which == 39) {
                //right arrow
                gprev();
            } else if (e.which == 27) {
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
    // var ele  = $('.project-img-box img[src="' + $('.project-gallery-bimg').attr('src') + '"]');
    // var prev = $('.project-img-box img').index(ele) - 1;
    // if (prev < 0) {
    //     prev = $('.project-img-box img').length - 1;
    // }
    // $('.project-gallery-bimg').fadeOut(300, function () {
    //     $('.project-gallery-bimg').attr('src', $('.project-img-box img').eq(prev).attr('src'));
    //     $('.project-gallery-bimg').fadeIn(300);
    // });
    var cimg = $('.slide').index($('.slide.show')[0]);
    $('.slide').eq(cimg).removeClass('show');
    cimg--;
    if (cimg < 0) {
        cimg = $('.slide').length - 1;
    }
    $('.slide').eq(cimg).addClass('show');
}

function gnext() {
    // var ele  = $('.project-img-box img[src="' + $('.project-gallery-bimg').attr('src') + '"]');
    // var next = $('.project-img-box img').index(ele) + 1;
    // if (next >= $('.project-img-box img').length) {
    //     next = 0;
    // }
    // $('.project-gallery-bimg').fadeOut(300, function () {
    //     $('.project-gallery-bimg').attr('src', $('.project-img-box img').eq(next).attr('src'));
    //     $('.project-gallery-bimg').fadeIn(300);
    // });
    var cimg = $('.slide').index($('.slide.show')[0]);
    $('.slide').eq(cimg).removeClass('show');
    cimg++;
    if (cimg >= $('.slide').length) {
        cimg = 0;
    }
    $('.slide').eq(cimg).addClass('show');
}

function contact() {
    if ($('body').data('device') == "computer") {

        $('.contact-container').mousewheel(function (e) {
            var sc = (this.scrollWidth - $(this).width()) / 10;
            if (sc < 150) {
                sc = 150;
            }
            $(this).stop().animate({
                scrollLeft: $(this).scrollLeft() - (e.deltaY * sc)
            }, 1000, 'easeOutCubic');
        });
    }
    $.getScript('https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyBGtpj2Q57-TODGzPxigmBeej6f2DTKslA', function () {
        var myLatlng      = new google.maps.LatLng(35.767750, 51.353778);
        var mapOptions    = {
            zoom  : 14,
            center: myLatlng,
            styles: [{
                "featureType": "all",
                "elementType": "geometry",
                "stylers"    : [{"color": "#f7f453"}]
            }, {
                "featureType": "all",
                "elementType": "geometry.fill",
                "stylers"    : [{"color": "#fed819"}, {"visibility": "on"}]
            }, {
                "featureType": "all",
                "elementType": "geometry.stroke",
                "stylers"    : [{"visibility": "off"}]
            }, {
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers"    : [{"gamma": 0.01}, {"lightness": 20}, {"visibility": "on"}]
            }, {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers"    : [{"saturation": -31}, {"lightness": -33}, {"weight": 2}, {"gamma": 0.8}, {"visibility": "off"}]
            }, {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers"    : [{"visibility": "off"}]
            }, {
                "featureType": "administrative.locality",
                "elementType": "geometry.fill",
                "stylers"    : [{"visibility": "off"}]
            }, {
                "featureType": "administrative.locality",
                "elementType": "geometry.stroke",
                "stylers"    : [{"visibility": "off"}]
            }, {
                "featureType": "administrative.land_parcel",
                "elementType": "geometry.fill",
                "stylers"    : [{"visibility": "off"}]
            }, {
                "featureType": "administrative.land_parcel",
                "elementType": "geometry.stroke",
                "stylers"    : [{"visibility": "off"}]
            }, {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers"    : [{"lightness": 30}, {"saturation": 30}, {"visibility": "on"}]
            }, {
                "featureType": "landscape",
                "elementType": "geometry.fill",
                "stylers"    : [{"visibility": "on"}, {"color": "#ffeb55"}]
            }, {
                "featureType": "landscape",
                "elementType": "labels.text.fill",
                "stylers"    : [{"visibility": "on"}]
            }, {
                "featureType": "landscape",
                "elementType": "labels.text.stroke",
                "stylers"    : [{"color": "#ff0000"}, {"visibility": "off"}]
            }, {
                "featureType": "landscape.natural.landcover",
                "elementType": "geometry.fill",
                "stylers"    : [{"visibility": "on"}]
            }, {
                "featureType": "landscape.natural.terrain",
                "elementType": "geometry.fill",
                "stylers"    : [{"color": "#ff0000"}, {"visibility": "off"}]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers"    : [{"saturation": 20}]
            }, {
                "featureType": "poi",
                "elementType": "geometry.fill",
                "stylers"    : [{"visibility": "on"}]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers"    : [{"lightness": 20}, {"saturation": -20}]
            }, {
                "featureType": "road",
                "elementType": "geometry",
                "stylers"    : [{"lightness": 10}, {"saturation": -30}]
            }, {
                "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers"    : [{"saturation": 25}, {"lightness": 25}]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry.fill",
                "stylers"    : [{"visibility": "on"}, {"color": "#f5e044"}]
            }, {
                "featureType": "road.local",
                "elementType": "geometry.fill",
                "stylers"    : [{"visibility": "on"}, {"color": "#f5e044"}]
            }, {
                "featureType": "water",
                "elementType": "all",
                "stylers"    : [{"lightness": -20}, {"visibility": "on"}, {"color": "#ececec"}]
            }]
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
    //

    // if ($('body').data('device') == "computer") {
    //     $('.about-container').mousewheel(function (e) {
    //         var sc = (this.scrollWidth - $(this).width()) / 10;
    //         if (sc < 150) {
    //             sc = 150;
    //         }
    //         $(this).stop().animate({scrollLeft: $(this).scrollLeft() - (e.deltaY * sc)}, 1000, 'easeOutCubic');
    //     });
    // }
}

function awards() {
    if ($('body').data('device') == "computer") {
        $('.awards-container').mousewheel(function (e) {
            var sc = ($('.awards-boxes-container')[0].scrollWidth - $('.awards-boxes-container').width()) / 10;
            if (sc < 150) {
                sc = 150;
            }
            $('.awards-boxes-container').stop().animate({
                scrollLeft: $('.awards-boxes-container').scrollLeft() - (e.deltaY * sc)
            }, 1000, 'easeOutCubic');
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
