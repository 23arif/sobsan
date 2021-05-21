<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Admin Panel</title>
    <meta name="description" content="description about your site"/>
    <meta name="keywords" content=""/>
    <meta name="author" content="ZTApps"/>
    <link rel="shortcut icon" href="">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <!-- End Fonts -->

    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/ionicons.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/animate/animate.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/xcharts/xcharts.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/owl-carousel/owl.carousel.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/owl-carousel/owl.transitions.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/clndr/clndr.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}?v=6.1"/>
    <!-- End CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/chosen/chosen.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/build.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/jquery-ui/jquery-ui.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/jquery-ui/jquery-ui.structure.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/jquery-ui/jquery-ui.theme.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/jquery-ui/jquery.datetimepicker.css')}}"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

</head>

<body class="header-fixed skin-blue">

<!-- Header Section -->
<header>

    <!-- Product Logo -->
    <a href="/" class="logo hidden-xs">
        <img src="{{asset('/assets/images/logo.png')}}">
    </a>
    <!-- End Product Logo -->

    <!-- Header Navigation -->
    <nav class="navbar-main" role="navigation">

        <!-- Left Button Container -->
        <ul class="button-container pull-left">

            <li class="item">
                <!-- Left Sidebar Toggle Button -->
                <a id="sidebarLeftToggle" class="nav-button" data-toggle="collapse" data-target=".sidebarLeft">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bars"></span>
                </a>
            </li>
        </ul>
        <!-- End Left Button Container -->

        <!-- Right Button Container -->
        <ul class="button-container pull-right">

            <li class="item">
                <!-- Right Sidebar Toggle Button -->
                <a href="{{asset('/logout')}}" id="sidebarRightToggle" class="nav-button" data-toggle="collapse"
                   data-target=".sidebarRight">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-sign-out"></span>
                    Çıxış
                </a>
                <!-- End Right Sidebar Toggle Button -->
            </li>

            {{--<li class="item dropdown collapse sidebarRight chat-search hidden-xs">--}}
            {{--<!-- Chat List Search Form -->--}}
            {{--<form class="search-form" role="search">--}}
            {{--<input class="form-control" type="text" placeholder="Search Users...">--}}
            {{--</form>--}}
            {{--<!-- End Chat List Search Form -->--}}
            {{--</li>--}}

        </ul>
        <!-- End Right Button Container -->

        <!-- Navbar Content Center -->
        <div class="nav-content">
            <!-- Page Title -->
            <h3 class="page-title">Admin Panel</h3>
            <!-- End Page Title -->
        </div>
        <!-- End Navbar Content Center -->

    </nav>
    <!-- End Header Navigation -->

</header>
<!-- End Header Section -->

<!-- Left Sidebar -->
<aside class="sidebar sidebar-left collapse navbar-collapse sidebarLeft">

    <!-- Sidebar Wrapper -->
    <div class="sidebar-wrapper">

        <!-- Side Panel -->

        <!-- End Side Panel -->

        <!-- Sidebar Navigation Wrapper -->
        <div class="sidebar-nav-wrapper">

            <!-- User Conatiner -->
            <div class="user-container dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    <!--<div style="width:100%;text-align:center;">-->
                    <!--    <img style="width:120px;margin-bottom:15px;margin-top:15px;" src="">-->
                    <!--</div>-->
                    <div class="pull-left info">
                        @if(isset(Auth::user()->name))
                        <a><h4 class="name">{!! Auth::user()->name !!}</h4></a>
                        @endif
                        <a><h6 class="text-muted extra">@if(isset(Auth::user()->role) and Auth::user()->role == 1) Adminstrator @endif  </h6></a>
                    </div>
                </a>

            </div>
            <!-- End User Conatiner -->

            <!-- Search Form Container -->
            <!-- <div class="search-form-container">

                <input type="text" placeholder="Axtar..." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div> -->
            <!-- End Search Form Container -->

            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">

                <!-- Menu Item -->
                @if(isset(Auth::user()->role) and Auth::user()->role == 1)
                    <li class="border-left-green">
                        <a href="{{asset('/menu')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-navicon" aria-hidden="true"></i>
                            <span>Menu</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{asset('/bolme')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-list-ul" aria-hidden="true"></i>
                            <span>Kateqoriyalar</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{asset('/color')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-paint-brush "
                               aria-hidden="true"></i>
                            <span>Rənglər</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{asset('/product_list')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-shopping-basket"
                               aria-hidden="true"></i>
                            <span>Məhsullar</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{asset('/brend_list')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-tags"
                               aria-hidden="true"></i>
                            <span>Brendlər</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{asset('/branch_list')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-location-arrow"
                               aria-hidden="true"></i>
                            <span>Filiallar</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{asset('/career_list')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-location-arrow"
                               aria-hidden="true"></i>
                            <span>Karyera</span>
                        </a>
                    </li>


                    <li class="border-left-purple">
                        <a href="javascript:void(0);" style="text-decoration:none;" data-toggle="collapse"
                           data-target="#pages-atributlar" title="Pages">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-tags"
                               aria-hidden="true"></i> <span class="parent-item">Atributlar</span>
                            <i class="fa fa-caret-right submenu-indicator"></i>
                        </a>
                        <ul id="pages-atributlar" class="collapse">
                            <li>
                                <a href="{{asset('attribute_group_list')}}">Atribut qrupu</a>
                            </li>
                            <li>
                                <a href="{{asset('attribute_list')}}">Atributlar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="border-left-purple">
                        <a href="javascript:void(0);" style="text-decoration:none;" data-toggle="collapse"
                           data-target="#pages-submenu1" title="Pages">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-newspaper-o"
                               aria-hidden="true"></i> <span class="parent-item">Səhifələr</span>
                            <i class="fa fa-caret-right submenu-indicator"></i>
                        </a>
                        <ul id="pages-submenu1" class="collapse">
                            <li>
                                <a href="{{route('articleEdit',['type'=>'about'])}}">Haqqımızda</a>
                            </li>

                            <li>
                                <a href="{{route('articleEdit',['type'=>'catdirilma'])}}">Ödəniş və Çatdırılma</a>
                            </li>

                            <li>
                                <a href="{{route('articleEdit',['type'=>'zemanet'])}}">Zəmanət Şərtləri</a>
                            </li>
                        </ul>
                    </li>

                    <li class="border-left-green">
                        <a href="{{asset('/actions_list')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-file-text"
                               aria-hidden="true"></i>
                            <span>Aksiyalar</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{route('bannerList')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-image" aria-hidden="true"></i>
                            <span>Növlərə görə kateqoriyalar</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{asset('/slider_list')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-image" aria-hidden="true"></i>
                            <span>Slider</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{asset('/promo_list')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-percent"
                               aria-hidden="true"></i>
                            <span>Promocode</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{route('discountCardEdit',['id'=>1])}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-credit-card" aria-hidden="true"></i>
                            <span>Home banner 1</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{asset('video_list')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-file-video-o"
                               aria-hidden="true"></i> <span>Video qalereya</span>
                        </a>
                    </li>
                    {{--                    <li class="border-left-purple">--}}
                    {{--                        <a href="javascript:void(0);" style="text-decoration:none;" data-toggle="collapse"--}}
                    {{--                           data-target="#pages-submenu-gallery" title="Pages">--}}
                    {{--                            <i style="font-size:17px;margin-right:10px;" class="fa fa-image"--}}
                    {{--                               aria-hidden="true"></i> <span class="parent-item">Qalereya</span>--}}
                    {{--                            <i class="fa fa-caret-right submenu-indicator"></i>--}}
                    {{--                        </a>--}}
                    {{--                        <ul id="pages-submenu-gallery" class="collapse">--}}
                    {{--                            <li>--}}
                    {{--                                <a href="{{asset('foto_galery_list')}}">Foto qalereya</a>--}}
                    {{--                            </li>--}}

                    {{--                            <li>--}}
                    {{--                                <a href="{{asset('video_galery_list')}}">Video qalereya</a>--}}
                    {{--                            </li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}


                    <li class="border-left-green">
                        <a href="{{asset('order_list')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-list-alt"
                               aria-hidden="true"></i> <span>Sifarişlər</span>
                        </a>
                    </li>

                     <li class="border-left-green">
                        <a href="{{asset('home_edit')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-home"
                               aria-hidden="true"></i> <span>Home</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{asset('partner_list')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-users"
                               aria-hidden="true"></i> <span>Partnyorlar</span>
                        </a>
                    </li>

                    <li class="border-left-green">
                        <a href="{{asset('users_list')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-users" aria-hidden="true"></i>
                            <span>İstifadəçilər</span>
                        </a>
                    </li>

                    <li class="border-left-green" style="margin-bottom: 100px">
                        <a href="{{asset('animationwordsadd')}}" title="Dashboard">
                            <i style="font-size:17px;margin-right:10px;" class="fa fa-cog" aria-hidden="true"></i>
                            <span>Tənzimləmələr</span>
                        </a>
                    </li>

            @endif


            {{--                <li class="border-left-purple">--}}
            {{--                    <a href="javascript:void(0);" style="text-decoration:none;" data-toggle="collapse"--}}
            {{--                       data-target="#pages-submenu" title="Pages">--}}
            {{--                        <i style="font-size:17px;margin-right:10px;" class="fa fa-user" aria-hidden="true"></i> <span--}}
            {{--                            class="parent-item">Profil</span>--}}
            {{--                        <i class="fa fa-caret-right submenu-indicator"></i>--}}
            {{--                    </a>--}}
            {{--                    <ul id="pages-submenu" class="collapse">--}}
            {{--                        <li>--}}
            {{--                            <a href="{{asset('profil')}}">Profil</a>--}}
            {{--                        </li>--}}

            {{--                        @if(Auth::user()->role == 2)--}}
            {{--                            <li>--}}
            {{--                                <a href="{{asset('newregister')}}">Admin Qeydiyyatı</a>--}}
            {{--                            </li>--}}
            {{--                            <li>--}}
            {{--                                <a href="{{asset('adminslist')}}">Admin Siyahısı</a>--}}
            {{--                            </li>--}}

            {{--                        @endif--}}


            {{--                    </ul>--}}
            {{--                </li>--}}
            <!-- End Menu Item -->


                <!-- End Menu Item -->

                <!-- Menu Item -->

                <!-- End Menu Item -->

            </ul>
            <!-- End Sidebar Navigation -->

        </div>
        <!-- End Sidebar Navigation Wrapper -->

    </div>
    <!-- End Sidebar Wrapper -->

</aside>

@yield('content')


<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="{{asset('/assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('/assets/js/jquery-ui/build/jquery.datetimepicker.full.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });

</script>

<script>
    $(document).ready(function () {

        $('#datepicker').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat: "hh:mm:ss"
        });
    });
</script>
<script>
    $(document).ready(function () {

        $('#timepicker').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat: "hh:mm:ss"
        });
    });
</script>
<script src="{{asset('/assets/js/pace/pace.min.js')}}"></script>
<script src="{{asset('/assets/js/Bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('/assets/js/placeholders/placeholders.min.js')}}"></script>
<script src="{{asset('/assets/js/jquery.knob/jquery.knob.js')}}"></script>
<script src="{{asset('/assets/js/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('/assets/js/d3/d3.min.js')}}"></script>
<script src="{{asset('/assets/js/moment/moment.min.js')}}"></script>
<script src="{{asset('/assets/js/xcharts/xcharts.min.js')}}"></script>
<script src="{{asset('/assets/js/skycons/skycons.js')}}"></script>
<script src="{{asset('/assets/js/clndr/clndr.min.js')}}"></script>
<script src="{{asset('/assets/js/nav.js')}}"></script>
<script src="{{asset('/assets/js/custom.js')}}"></script>
<script src="{{asset('/assets/js/dashboard-demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.js"></script>
<script src="https://maps.google.com/maps/api/js?libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script src="{{asset('/assets/js/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('/assets/js/chosen/chosen.jquery.min.js')}}"></script>
<script src="{{asset('/assets/js/compose-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@if($errors->has('imageP'))
    <script>

        $('#exampleModal1').modal('show');

    </script>
@endif
@if($errors->has('cover'))
    <script>


        $('#exampleModal2').modal('show');

    </script>
@endif
@if($errors->all() && (!$errors->has('imageP') && !$errors->has('cover')))
    <script>

        $('#exampleModal').modal('show');

    </script>
@endif


<script type="text/javascript">
    function add() {
        var new_chq_no = parseInt($('#total_chq').val()) + 1;

        var new_input = "<div id='new_" + new_chq_no + "'><label class='col-sm-1 control-label'>Kolleksiya adi</label><div class='col-sm-11 col-sm-offset-1'><input type='text' class='form-control' name='collection_name[]'></div><label class='col-sm-1 control-label'>Kolleksiya rengi</label><div class='col-sm-11 col-sm-offset-1'><input type='text' class='form-control' name='collection_color[]'></div><label class='col-sm-1 control-label'>Kolleksiya olcusu</label><div class='col-sm-11 col-sm-offset-1'><input type='text' class='form-control' name='collection_size[]'></div><label class='col-sm-1 control-label'>Kolleksiya sekili</label><div class='col-sm-11 col-sm-offset-1'><input type='file' multiple='multiple' class='form-control' name='collection_img[]'></div></div>";
        $('#new_chq').append(new_input);
        $('#total_chq').val(new_chq_no)
    }

    function remove() {
        var last_chq_no = $('#total_chq').val();
        if (last_chq_no > 1) {
            $('#new_' + last_chq_no).remove();
            $('#total_chq').val(last_chq_no - 1);
        }
    }
</script>

<script type="text/javascript">
    $('.fotocate').change(function () {
        foto_val = $(this).val();

        if (foto_val == 'photo') {
            $('.photo').css('display', 'block');
            $('.shop').css('display', 'block')
            $('.video').css('display', 'none');
        } else {
            $('.video').css('display', 'block');
            $('.photo').css('display', 'none');
            $('.shop').css('display', 'none');
        }


    })
</script>
<script type="text/javascript">
    $('#us2').locationpicker({
        location: {
            latitude: $('#us2-lat').val(),
            longitude: $('#us2-lon').val()
        },
        radius: 0,
        inputBinding: {
            latitudeInput: $('#us2-lat'),
            longitudeInput: $('#us2-lon'),
            radiusInput: $('#us2-radius'),
            locationNameInput: $('#us2-address')
        },
        enableAutocomplete: true,
        enableAutocompleteBlur: true,
        autocompleteOptions: {
            types: ['(places)'],
        }
    });
</script>
@yield('js')
</body>


</html>
