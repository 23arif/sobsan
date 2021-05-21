<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Admin Panel</title>
    <meta name="description" content="description about your site" />
    <meta name="keywords" content="" />
    <meta name="author" content="ZTApps" />
    <link rel="shortcut icon" href="">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oxygen:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>
    <!-- End Fonts -->

    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('gence')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/ionicons.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/animate/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/xcharts/xcharts.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/owl-carousel/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/owl-carousel/owl.transitions.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/clndr/clndr.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style_bak.css')}}" />
    <!-- End CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/chosen/chosen.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/summernote/summernote.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/summernote/summernote-bs3.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('memim/css/wickedpicker.css')}}" />
    <script src="http://ericjgagnon.github.io/wickedpicker/javascript/jquery-1.11.3.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/build.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/jquery-ui/jquery-ui.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/jquery-ui/jquery-ui.structure.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/jquery-ui/jquery-ui.theme.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/jquery-ui/jquery.datetimepicker.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
     <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script src="{{asset('memim/js/wickedpicker.js')}}"></script>






</head>

<body class="header-fixed skin-blue">

<!-- Header Section -->
<header>

    <!-- Product Logo -->
    <a href="/" class="logo hidden-xs">
                <span class="icon">
                    <i class="fa fa-pagelines"></i>
                </span>
        Memim
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
                <a href="/logout" id="sidebarRightToggle" class="nav-button" data-toggle="collapse" data-target=".sidebarRight">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-sign-out">Çıxış</span>
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
                    <div style="width:100%;text-align:center;">
                        <img style="width:120px;margin-bottom:15px;margin-top:15px;" src="{{asset('gence')}}">
                    </div>
                    <div class="pull-left info">
                        <a href="/profil" ><h4 class="name">{!! Auth::user()->name !!}</h4></a>
                        <a href="/profil" > <h6 class="text-muted extra">@if(Auth::user()->role == 2) Adminstrator @else Jurnalist @endif  </h6></a>
                    </div>
                </a>

            </div>
            <!-- End User Conatiner -->

            <!-- Search Form Container -->
            <!-- <div class="search-form-container">
                <form  action="{!! URL::action('FutbolController@searchAdmin') !!}" method="GET" class="search-form" role="search">
                    {!! csrf_field() !!}
                    <input type="text" placeholder="Axtar..." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div> -->
            <!-- End Search Form Container -->

            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">

                <!-- Menu Item -->
                @if(Auth::user()->role == 2)

                <!-- <li class="border-left-green">
                    <a href="/" title="Dashboard">
                        <i class="menu-icon fa fa-lg fa-fw fa-dashboard"></i> <span>Ana Səhifə</span>
                    </a>
                </li> -->

                <li class="border-left-green">
                    <a href="{{asset('/bolme')}}" title="Dashboard">
                    <i style="font-size:17px;margin-right:10px;" class="fa fa-list-ul" aria-hidden="true"></i> <span>Kateqoriyalar</span>
                    </a>
                </li>

                 <li class="border-left-purple">
                    <a href="javascript:void(0);" style="text-decoration:none;" data-toggle="collapse" data-target="#pages-submenu1" title="Pages">
                        <i style="font-size:17px;margin-right:10px;" class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="parent-item">Xəbərlər</span>
                        <i class="fa fa-caret-right submenu-indicator"></i>
                    </a>
                    <ul id="pages-submenu1" class="collapse" >
                        <li>
                            <a href="{{asset('news_category')}}">Xəbər Kateqoriyaları</a>
                        </li>

                        <li>
                            <a href="{{asset('news_list')}}">Xəbərlər</a>
                        </li>
                    </ul>
                </li>


                <li class="border-left-green">
                    <a href="{{asset('partners')}}" title="Dashboard">
                        <i style="font-size:17px;margin-right:10px;" class="fa fa-briefcase" aria-hidden="true"></i> <span>Partnyorlar</span>
                    </a>
                </li>

                 <li class="border-left-green">
                    <a href="{{asset('trainer_list')}}" title="Dashboard">
                        <i style="font-size:17px;margin-right:10px;" class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Təlimçilər</span>
                    </a>
                </li>

                 <li class="border-left-purple">
                    <a href="javascript:void(0);" style="text-decoration:none;" data-toggle="collapse" data-target="#pages-submenu2" title="Pages">
                        <i style="font-size:17px;margin-right:10px;" class="fa fa-chevron-down" aria-hidden="true"></i> <span class="parent-item">Metodiki Tövsiyələr</span>
                        <i class="fa fa-caret-right submenu-indicator"></i>
                    </a>
                    <ul id="pages-submenu2" class="collapse" >
                        <li>
                            <a href="{{asset('advice_category_list')}}">Kateqoriyalar</a>
                        </li>

                        <li>
                            <a href="{{asset('advice_list')}}">Metodiki Tövsiyələr</a>
                        </li>
                    </ul>
                </li>

                <li class="border-left-purple">
                    <a href="javascript:void(0);" style="text-decoration:none;" data-toggle="collapse" data-target="#pages-submenu3" title="Pages">
                        <i style="font-size:17px;margin-right:10px;" class="fa fa-chevron-down" aria-hidden="true"></i> <span class="parent-item">İxtisasartırma cədvəli</span>
                        <i class="fa fa-caret-right submenu-indicator"></i>
                    </a>
                    <ul id="pages-submenu3" class="collapse" >
                        <li>
                            <a href="{{asset('specialty_table_list')}}">Kateqoriyalar</a>
                        </li>

                        <li>
                            <a href="{{asset('cedvel_list')}}">İxtisasartırma cədvəli</a>
                        </li>
                    </ul>
                </li>

                <li class="border-left-purple">
                    <a href="javascript:void(0);" style="text-decoration:none;" data-toggle="collapse" data-target="#pages-submenu4" title="Pages">
                       <i style="font-size:17px;margin-right:10px;" class="fa fa-chevron-down" aria-hidden="true"></i> <span class="parent-item">İxtisasartırma təlimləri</span>
                        <i class="fa fa-caret-right submenu-indicator"></i>
                    </a>
                    <ul id="pages-submenu4" class="collapse" >
                        <li>
                            <a href="{{asset('specialty_training_list')}}">Kateqoriyalar</a>
                        </li>

                        <li>
                            <a href="{{asset('ders_list')}}">İxtisasartırma cədvəli</a>
                        </li>
                    </ul>
                </li>



                <li class="border-left-green">
                    <a href="{{asset('about_list')}}" title="Dashboard">
                       <i style="font-size:17px;margin-right:10px;" class="fa fa-align-center" aria-hidden="true"></i> <span>Haqqımızda</span>
                    </a>
                </li>

                <li class="border-left-green">
                    <a href="{{asset('menu_list')}}" title="Dashboard">
                       <i style="font-size:17px;margin-right:10px;" class="fa fa-bars" aria-hidden="true"></i> <span>Menular</span>
                    </a>
                </li>


                <li class="border-left-green">
                    <a href="{{asset('/article')}}" title="Dashboard">
                        <i style="font-size:17px;margin-right:10px;" class="fa fa-text-width" aria-hidden="true"></i> <span>Mətnlər</span>
                    </a>
                </li>





                <li class="border-left-green">
                    <a href="{{asset('animationwordsadd')}}" title="Dashboard">
                        <i style="font-size:17px;margin-right:10px;" class="fa fa-cog" aria-hidden="true"></i> <span>Settings</span>
                    </a>
                </li>

                  @endif


                <li class="border-left-purple">
                    <a href="javascript:void(0);" style="text-decoration:none;" data-toggle="collapse" data-target="#pages-submenu" title="Pages">
                        <i style="font-size:17px;margin-right:10px;" class="fa fa-user" aria-hidden="true"></i> <span class="parent-item">Profil</span>
                        <i class="fa fa-caret-right submenu-indicator"></i>
                    </a>
                    <ul id="pages-submenu" class="collapse" >
                        <li>
                            <a href="{{asset('profil')}}">Profil</a>
                        </li>

                        @if(Auth::user()->role == 2)
                        <li>
                            <a href="{{asset('newregister')}}">Admin Qeydiyyatı</a>
                        </li>
                        <li>
                            <a href="{{asset('adminslist')}}">Admin Siyahısı</a>
                        </li>

                          @endif


                    </ul>
                </li>
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
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

</script>

<script>
    $(document).ready(function() {

        $('#datepicker').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat:  "hh:mm:ss"
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('#timepicker').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat:  "hh:mm:ss"
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

<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>

            var twelveHour = $('.timepicker-12-hr').wickedpicker();
            $('.time').text('//JS Console: ' + twelveHour.wickedpicker('time'));
            $('.timepicker-24-hr').wickedpicker({twentyFour: true});
            $('.timepicker-12-hr-clearable').wickedpicker({clearable: true});

</script>






<script>
    CKEDITOR.replace( 'ckeditor', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
        extraPlugins: 'colorbutton,font,justify,codesnippet,smiley,iframe,print,scayt,templates,find,flash',
        skin: 'kama',
        language: 'en',
    });


</script>



<script>
    CKEDITOR.replace( 'ckeditor1', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
        extraPlugins: 'colorbutton,font,justify,codesnippet,smiley,iframe,print,scayt,templates,find,flash',
        skin: 'kama',
        language: 'en',
    });

</script>

<script>
    CKEDITOR.replace( 'ckeditor2', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
        extraPlugins: 'colorbutton,font,justify,codesnippet,smiley,iframe,print,scayt,templates,find,flash',
        skin: 'kama',
        language: 'en',
    });

</script>

<script>
    CKEDITOR.replace( 'ckeditor3', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
        extraPlugins: 'colorbutton,font,justify,codesnippet,smiley,iframe,print,scayt,templates,find,flash',
        skin: 'kama',
        language: 'en',
    });

</script>


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
   function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;

      var new_input="<div id='new_"+new_chq_no+"'><label class='col-sm-1 control-label'>Kolleksiya adi</label><div class='col-sm-11 col-sm-offset-1'><input type='text' class='form-control' name='collection_name[]'></div><label class='col-sm-1 control-label'>Kolleksiya rengi</label><div class='col-sm-11 col-sm-offset-1'><input type='text' class='form-control' name='collection_color[]'></div><label class='col-sm-1 control-label'>Kolleksiya olcusu</label><div class='col-sm-11 col-sm-offset-1'><input type='text' class='form-control' name='collection_size[]'></div><label class='col-sm-1 control-label'>Kolleksiya sekili</label><div class='col-sm-11 col-sm-offset-1'><input type='file' multiple='multiple' class='form-control' name='collection_img[]'></div></div>";
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no)
    }
    function remove(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }
</script>

  <script type="text/javascript">
    $('.fotocate').change(function(){
       foto_val = $(this).val();

       if(foto_val == 'photo'){
        $('.photo').css('display','block');
        $('.shop').css('display','block')
        $('.video').css('display','none');
       }else{
        $('.video').css('display','block');
        $('.photo').css('display','none');
         $('.shop').css('display','none');
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

</script>



</body>



</html>
