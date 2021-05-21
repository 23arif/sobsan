<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(25deg,#1747b5,#9122ff) center no-repeat;   
            height: 100vh;
            width: 100vw;
            color: white;
            animation: animateBG 10s infinite;
        }
        
        .logo img{
            height: 30px;
        }
        
        .card{
            display: flex;
            justify-content: center;
        }
        
        form, .logo{
            width: 320px;
        }
        
        .logo{
            /*border-left:5px solid rgba(255,255,255,0.2);*/
            margin-bottom: 15px;
            /*padding-left: 20px;*/
        }
        
        .form-control{
            border: none;
            outline: none;
            border-radius: 0;
            font-size: 16px !important;
            font-weight: 400;
            height: auto;
            padding: 10px 20px;
            background: white;
            color: black !important;
            box-shadow: 0 10px 15px 0 rgba(0,0,0,0.1);
            transition: 0.3s ease;
        }
        
        .form-control:focus{
            box-shadow: 0 10px 15px 0 rgba(0,0,0,0.1);
            width: 106%;
            padding: 13px 20px;
            margin-left: -3%;
        }
        
        .logo h1{
            font-size: 24px;
            margin: 0;
            margin-top: 15px;
            font-weight: 300;
            opacity: 0.6;
        }
        
        label{
            font-weight: 500;
            padding: 8px 0 !important;
            font-size: 16px;
        }
        
        .btn,
        .btn:focus,
        .btn:active,
        .btn:hover{
            outline: none;
            color: inherit;
            border: none;
        }
        
        .btn{
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 0;
            border: none;
            height: auto;
            background: black;
            color: white;
            font-weight: 600;
            font-size: 18px;
            width: 100%;
            transition: 0.5s ease;
            position: relative;
            box-shadow: 0 10px 15px 0 rgba(0,0,0,0.1);
        }
        
        .btn:after{
            content: 'Login';
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 0;
            height: 100%;
            background-color: #35beff;
            color: transparent;
            transition: all 0.5s ease, color 1s ease;
            opacity: 0;
        }
        
        .btn:hover{
            box-shadow: 0 13px 20px 0 #35beff61;
            
        }
        
        
        .btn:hover:after{
            width: 100%;
            opacity: 1;
            color: #005b86;
        }
        
        .info{
            background-color: white;
            color: black;
            padding: 0 10%;
            position: relative;
            overflow: hidden;
            z-index: 2;
            box-shadow: 30px 0 50px 0 #00000020;
        }
        @keyframes animateCloud_f {
              0%   {top: -50%; transform: rotateZ(0deg);}
              25% {transform: rotateZ(270deg);}
              50%  {top: 0%; transform: rotateZ(0deg);}
              100% {top: -50%;}
        }
        
        @keyframes animateCloud_s{
            0%   {bottom: -50%; transform: rotateZ(0deg);}
            50%  {bottom: 0%; transform: rotateZ(180deg);}
            100% {bottom: -50%; transform: rotateZ(360deg);}
        }
        
        .info:after,
        .info:before{
            content: '';
            display: block;
            position: absolute;
            border-radius: 100%;
            box-shadow: 0 0 100px 10px #3300ff80;
            height: 90%;
            width: calc(90vh);
            /*transition: 1s ease;*/
            
        }
        
        .info:before{
            left: -50%;
            top: -50%;
            font-size: 100px;
            background-image: linear-gradient(45deg, #4b00ff, #0400ff00);
            opacity: 0.4;
            animation: animateCloud_f 10s infinite;
        }
        
        .info:after{
            right: -50%;
            bottom: -50%;
            background-image: linear-gradient(45deg, #0008ff, #0400ff00);
            opacity: 0.3;
            animation: animateCloud_s 10s infinite;
        }
        
        .info h1,
        .info h5,
        .info b{
            z-index: 10;
        }
        
        .info h1{
            font-size: 50px;
            font-weight: 600;
        }
        
        .info b{
            font-weight: 600;
        }
        
        .info h5{
            color: #0000007a;
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 5px;
            line-height: 24px;
        }
        
        .half{
            width: 100%;
            height: 100%;
            float: left;
            display: flex;
            justify-content: center;
            flex-flow: column;
            align-items: center;
            position: relative;
        }
        
        .slide-up-msg{
            position: absolute;
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 5;
        }
        
        .slide-up-msg img{
            height: 30px;
            margin-bottom: 10px;
        }
        
        .slide-up-msg .slide-up{
            font-size: 18px;
            color: white;
            font-weight: 500;
            display: flex;
            align-items: center;
            flex-flow: column;
            opacity: 0.8;
            position: relative;
            top: 0;
            transition: 0.5s ease;
        }
        
        .slide-up.switched{
            top: -200px;
            padding: 15px;
            border-radius: 10px;
            background: rgb(0, 0, 0, 0.8);
        }
        
        .slide-up:hover{
            text-decoration: none;
        }
        
        .slide-up.switched img{
            transform: rotateZ(180deg);
        }
        
        .left-align{
            align-items: flex-start;
        }
        
        @media(min-width: 768px){
            .half{
                width: 50%;
            }
            
            .slide-up-msg{
                display: none;
            }
        }
        
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
        
        <div class="half info left-align" id="info">
            <h1>İşinizdəki müsbət zərrəcik</h1>
            <h5><b>Ünvan:</b> Ə.Rəcəbli 156, AYNALI PLAZA, 6-cı mərtəbə, ofis 65</h5>
            <h5><b>Tel:</b> (012) 565 57 30</h5>
            <h5><b>Mob:</b> (050) 990 66 00</h5>
        </div>
        <div class="half login-side" id="login-side">
            <div class="slide-up-msg"><a href="#info" class="slide-up"><img src="{{asset('assets/images/arrow-up.svg')}}">Sürüşdür</a></div>
            <div class="logo">
                <img src="{{asset('assets/images/logo.png')}}">
                <h1>Admin Panel</h1>
            </div>
            @yield('content')
        </div>
    

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    
    <script>
        $(".slide-up").click(function(e) {
            e.preventDefault();
            var aid = $(this).attr("href");
            console.log(aid);
            $('html,body').animate({scrollTop: $(aid).offset().top},500);
            $(this).toggleClass('switched');
            if(aid==="#info"){
                console.log('HAHAHHAA');
                aid = "#login-side";
            } else{
                aid = "#info";
            }
            $(this).attr("href", aid);
        });
    </script>
</body>
</html>
