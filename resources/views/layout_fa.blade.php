<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ url('/') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <title>سیستم سلامت ایرانیان</title>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/component.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/style.css') }}">
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/reval.js"></script>
    <script src="/js/classie.js"></script>
</head>
<body data-page="{{ $page }}">
<div id="st-container" class="st-container">

    <nav class="st-menu st-effect-11" id="menu-1">
        <div class="identity">
            <img src="/img/logo.png" alt="">
        </div>
        <ul>
            <li><a class="menu-a" href="/fa/home" data-page="/fa/home">خانه</a></li>
            <li><a class="menu-a" href="/fa/about" data-page="/fa/about">درباره ما</a></li>
            <li><a class="menu-a" href="/fa/projects" data-page="/fa/projects">پروژه ها</a></li>
            <li><a class="menu-a" href="/fa/awards" data-page="/fa/awards">جوایز</a></li>
            <li><a class="menu-a" href="/fa/contact" data-page="/fa/contact">تماس با ما</a></li>
        </ul>
    </nav>
    <div class="st-pusher">

        <div class="st-content"><!-- this is the wrapper for the content -->
            <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->

                <section class="inner-ajax" id="pjax">

                    {!! $content !!}

                </section>
                <div class="loading hide-loading"></div>
                <div id="st-trigger-effects" class="column">
                    <button data-effect="st-effect-11">
                        <div class="menu-spin">
                            <span></span><span></span><span></span>
                        </div>
                    </button>
                </div>
            </div><!-- /st-content-inner -->
        </div><!-- /st-content -->

    </div><!-- /st-pusher -->

</div><!-- /st-container -->

<script src="/js/script.js"></script>

</body>
<script type="text/javascript">
    /**
     * sidebarEffects.js v1.0.0
     * http://www.codrops.com
     *
     * Licensed under the MIT license.
     * http://www.opensource.org/licenses/mit-license.php
     *
     * Copyright 2013, Codrops
     * http://www.codrops.com
     */
    var SidebarMenuEffects = (function () {

        function hasParentClass(e, classname) {
            if (e === document) return false;
            if (classie.has(e, classname)) {
                return true;
            }
            return e.parentNode && hasParentClass(e.parentNode, classname);
        }

        // http://coveroverflow.com/a/11381730/989439
        function mobilecheck() {
            var check = false;
            (function (a) {
                if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true
            })(navigator.userAgent || navigator.vendor || window.opera);
            return check;
        }

        function init() {

            var container   = document.getElementById('st-container'),
                buttons     = Array.prototype.slice.call(document.querySelectorAll('#st-trigger-effects > button')),
                // event type (if mobile use touch events)
                eventtype   = mobilecheck() ? 'touchstart' : 'click',
                resetMenu   = function () {
                    classie.remove(container, 'st-menu-open');
                },
                bodyClickFn = function (evt) {
                    if (!hasParentClass(evt.target, 'st-menu')) {
                        resetMenu();
                        document.removeEventListener(eventtype, bodyClickFn);
                    }
                };

            buttons.forEach(function (el, i) {
                var effect = el.getAttribute('data-effect');

                el.addEventListener(eventtype, function (ev) {
                    ev.stopPropagation();
                    ev.preventDefault();
                    container.className = 'st-container'; // clear
                    classie.add(container, effect);
                    setTimeout(function () {
                        classie.add(container, 'st-menu-open');
                    }, 25);
                    document.addEventListener(eventtype, bodyClickFn);
                });
            });

        }

        init();

    })();
</script>
</html>
