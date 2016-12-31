<!DOCTYPE html>
<html>
<head>
    {{ $event = NULL }}
    <title>IHS - Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
          rel="stylesheet">
    <link href="/gentelella/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <link href="/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="/gentelella/vendors/switchery/dist/switchery.min.css" rel="stylesheet">

    <link href="/gentelella/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <link href="/gentelella/build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/admin/sweetalert.css">
    <script src="/gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/js/admin/jquery-ui.js"></script>
    <script src="/js/admin/tether.js"></script>
    {{--<script src="/js/admin/bootstrap-4.js"></script>--}}
    <script src="/js/admin/bootstrap-select.js"></script>
    <script src="/js/admin/bootstrap-switch.js"></script>
    <script src="/js/admin/bootstrap-growl.js"></script>
    <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="/gentelella/vendors/switchery/dist/switchery.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
        });

    </script>
    <style>
        .grid-actions {
            text-align : right;
            float      : right;
            }

        .grid-actions .btn {
            margin-left : 16px;
            }

        .sortable-handle {
            cursor : move;
            width  : 40px;
            color  : #ddd;
            }

        .id-column {
            width : 40px;
            }

        /** notifications style */
        .alert {
            font-size : 14px;
            }

        .bootstrap-growl .close {
            margin-left : 10px;
            }

        /** forms */
    </style>
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><img height="35px" width="35px" src="/logo-sign.png"
                                                                 alt="">
                        <span>Dokmeh Studio</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="/gentelella/production/images/logo.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{ auth()->user()->name  }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="/admin"><i class="fa fa-home"></i> Home </a>
                            </li>
                            <li><a><i class="fa fa-building-o"></i> Projects <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/project">All Projects</a></li>
                                    <li><a href="/admin/project/create">Create project</a></li>
                                    <li><a href="/admin/project/sort">Sort projects</a></li>

                                </ul>
                            </li>

                            <li><a><i class="fa fa-trophy"></i> Awards <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/awards">All Awards</a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>Categories & Statuses</h3>
                        <ul class="nav side-menu">
                            <li><a href="/admin/category/create"><i class="fa fa-list"></i> Categories</a></li>
                            <li><a href="/admin/status/create"><i class="fa fa-check-square-o"></i> Statuses</a></li>
                            <li><a href="/admin/about"><i class="fa fa-info-circle"></i> About Page</a></li>


                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="/gentelella/production/images/logo.png" alt="">{{ auth()->user()->name }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="/register"> <i class="fa fa-pencil-square-o pull-right"></i> Register </a>
                                </li>

                                <li><a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">


            @yield('content')

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Powered By Dokmeh Studio
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<script src="/gentelella/vendors/fastclick/lib/fastclick.js"></script>
<script src="/gentelella/vendors/nprogress/nprogress.js"></script>

<script src="/gentelella/vendors/DateJS/build/date.js"></script>

<script src="/gentelella/vendors/moment/min/moment.min.js"></script>
<script src="/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/gentelella/build/js/custom.min.js"></script>


<script src="/js/admin/dropzone.js"></script>
<script src="/js/admin/sweetalert.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.0/tinymce.min.js"></script>
<script src="/gentelella/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="/gentelella/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="/gentelella/vendors/google-code-prettify/src/prettify.js"></script>
<script>
    $(document).ready(function () {
        $('.datetime').daterangepicker({
            singleDatePicker: true,
            calender_style  : "picker_4"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>

<!-- /bootstrap-wysiwyg -->

@include('partials.flash')


</body>
</html>
