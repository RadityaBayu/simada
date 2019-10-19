<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SIMADA</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <style>
        @font-face {
            font-family: 'Glyphicons Halflings';
            src: url('<?= url('css/fonts/glyphicons-halflings-regular.eot') ?>');
            src: url('<?= url('css/fonts/glyphicons-halflings-regular.eot') ?>') format('embedded-opentype'),  url('<?= url('css/fonts/glyphicons-halflings-regular.woff') ?>') format('woff'), url('<?= url('css/fonts/glyphicons-halflings-regular.ttf') ?>') format('truetype'), url('<?= url('css/fonts/glyphicons-halflings-regular.svg') ?>') format('svg');
        }
    </style>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= url('css/thirdparty/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= url('css/thirdparty/bootstrap-datepicker.min.css') ?>">
    <link rel="stylesheet" href="<?= url('css/thirdparty/bootstrap-datepicker3.min.css') ?>">
    <link rel="stylesheet" href="<?= url('css/thirdparty/bootstrap-toggle.min.css') ?>">

    <!-- Font Awesome -->    
    <link rel="stylesheet" href="<?= url('css/thirdparty/font-awesome.min.css') ?>">

    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= url('css/thirdparty/ionicons.min.css') ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= url('css/thirdparty/AdminLTE.min.css') ?>">
    <link rel="stylesheet" href="<?= url('css/thirdparty/_all-skins.min.css') ?>">
    

    <link rel="stylesheet" href="<?= url('css/thirdparty/select2.min.css') ?>">

    <link rel="stylesheet" href="<?= url('css/thirdparty/select2-bootstrap.min.css') ?>">

    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= url('css/thirdparty/ionicons2.min.css') ?>">

    <link rel="stylesheet" href="<?= url('css/thirdparty/sweetalert2.min.css') ?>">

    <link rel="stylesheet" href="<?= url('css/thirdparty/responsive.dataTables.min.css') ?>">

    <link rel="stylesheet" href="<?= url('css/thirdparty/ol.css') ?>">

    <link rel="stylesheet" href="<?= url('css/thirdparty/select.dataTables.min.css') ?>">

    <script src="<?= url('js/thirdparty/knockout-3.5.0.js') ?>"></script>
   
    <script src="<?= url('js/app.ko.js?key='.sha1(time())) ?>"></script>

    @include('layouts.datatables_css')

    @yield('css')

    @include('layouts.css')
</head>

<input type="text" value="<?= url('') ?>" base-path style="display:none" />
<input type="text" value="<?= Storage::url('') ?>" base-storage style="display:none" />
<input type="text" value="<?= public_path('') ?>" base-http style="display:none" />

<body class="skin-blue sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <b>Simada</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="<?= url('images/user_male-icon.png') ?>"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="<?= url('images/user_male-icon.png') ?>""
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    InfyOm Generator
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">Login</a></li>
                    <li><a href="{!! url('/register') !!}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <script src="<?= url('js/thirdparty/ol.js') ?>"></script>

    <script src="<?= url('js/thirdparty/handlebars-v4.3.1.js') ?>"></script>

    <!-- jQuery 3.1.1 -->
    
    <script src="<?= url('js/thirdparty/jquery.min.js') ?>"></script>
    <script src="<?= url('js/thirdparty/jquery.mask.min.js') ?>"></script>

    @include('layouts.datatables_js')        

    <script src="<?= url('js/thirdparty/dataTables.select.min.js') ?>"></script>

    <script src="<?= url('js/thirdparty/moment.min.js') ?>"></script>
    <script src="<?= url('js/thirdparty/bootstrap.min.js') ?>"></script>
    <script src="<?= url('js/thirdparty/bootstrap-datepicker.min.js') ?>"></script>
    <script src="<?= url('js/thirdparty/bootstrap-toggle.min.js') ?>"></script>
    
    <!-- AdminLTE App -->
    <script src="<?= url('js/thirdparty/bootstrap-toggle.min.js') ?>"></script>
    <script src="<?= url('js/thirdparty/adminlte.min.js') ?>"></script>

    <script src="<?= url('js/thirdparty/select2.min.js') ?>"></script>

    <script src="<?= url('js/thirdparty/sweetalert2.min.js') ?>"></script>

    <script src="<?= url('js/public.js?key='.sha1(time())) ?>"></script>

    
    <script src="<?= url('js/plugins/inlinedatepicker.plugin.js?key='.sha1(time())) ?>"></script>

    <script src="<?= url('js/plugins/mapinput.plugin.js?key='.sha1(time())) ?>"></script>

    
    <script>

        $.fn.datepicker.defaults.language = 'in'
        $.fn.datepicker.defaults.autClose = true
        $.fn.datepicker.dates['in'] = {
            days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"],
            daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
            daysMin: ["Mg", "Sn", "Su", "Sl", "Rb", "Km", "Sb"],
            months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            today: "Hari Ini",
            clear: "Clear",
            format: "dd-mm-yyyy",
            titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
        };


        $(function() {
            $('input').attr('autocomplete','off');
            $('input').attr('autocorrect','off');
            $('form').attr('autocomplete','off');

            $('input[type=number]').keyup((obj) => {
                let valueNumber = parseInt(obj.target.value)
                const maxAttribute = obj.target.getAttribute('max')
                if (maxAttribute != undefined) {
                    if (valueNumber > parseInt(maxAttribute)) {
                        obj.target.value = parseInt(maxAttribute)
                    }
                }
            });  
            
            var elements = document.querySelectorAll("input,select");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        if (e.target.getAttribute('required') != null && (e.target.value == '' || e.target.value == null)) {
                            e.target.setCustomValidity("Data wajib di isi!");
                        }
                        
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        })


    </script>
    @yield('scripts')
    @yield('scripts_2')
    @include('layouts.pages')


    <script>        
        
        
    </script>
</body>
</html>
