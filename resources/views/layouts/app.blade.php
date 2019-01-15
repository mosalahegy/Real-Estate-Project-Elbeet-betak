<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('website/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('website/css/flexslider.css')}}" rel="stylesheet" />
    <link href="{{asset('website/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('website/css/font-awesome.min.css')}}" rel="stylesheet" />
    <script src="{{asset('website/js/jquery.min.js')}}"></script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    -->

    @yield('header')

    <title>
        البيت بيتك |
        @yield('title')
    </title>



</head>
<body>
    <div class="header">

        <div class="container-fluid"> <a class="navbar-brand pull-right" href="{{route('welcoming')}}"><i class="fa fa-home"></i> البيت بيتك </a>
            <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="{{asset('images/nav_icon.png')}}" alt="" /> </a>
                <ul class="nav" id="nav">
                       
                    <li class="{{ setLinkActive([''],'current') === '' ? 'current': ''}}"><a href="/">الرئيسية</a></li>
                    <li class="{{setLinkActive(['all-buildings'],'current')}}"><a href="/all-buildings">كل العقارات</a></li>
                    <li class="dropdown {{setLinkActive(['search'],'current')}}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            تمليك <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                @foreach(type() as $type => $value)
                                    <a  href="/search?rent=1&type={{$type}}">{{$value}}</a>
                                @endforeach
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown {{setLinkActive(['search'],'current')}}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            ايجار <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                @foreach(type() as $type => $value)
                                    <a  href="/search?rent=0&type={{$type}}">{{$value}}</a>
                                @endforeach
                            </li>
                        </ul>
                    </li>
                    <!--<li><a href="/user/buildings/create">اضف عقارك</a></li>-->
                    <li class="{{setLinkActive(['contact'],'current')}}"><a href="/contact">اتصل بنا </a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                        <li><a href="{{ route('register') }}">عضو جديد</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        تسجيل الخروج
                                    </a>
                                    @if(Auth::user()->admin == 1)
                                    <a  href="/adminpanel">الذهاب الى لوحة التحكم</a>
                                    @endif


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <div class="clear"></div>
                </ul>

            </div>
        </div>
    </div>

    <div id="app" class="app">
        <div class='content'>
            <div class="container-fluid">
                @if(!isset($noroute))
                    <div class='container-fluid col-md-8 col-sm-2 col-md-offset-2'>
                        
                        <ol class="breadcrumb">
                            @yield('route')
                        </ol>
                    </div>
                @endif
                
            </div>
            @include('messages.messages')
            @yield('content')
        </div>
    </div>


    <div class="footer">
        <div class="footer_bottom">
            <div class="follow-us"> <a class="fa fa-facebook social-icon" href="{{getSetting('facebook')}}"></a> <a class="fa fa-twitter social-icon" href="{{getSetting('twitter')}}"></a> <a class="fa fa-youtube social-icon" href="{{getSetting('youtube')}}"></a> <a class="fa fa-google-plus social-icon" href="{{getSetting('google')}}"></a> </div>
            <div class="copy">
                <p>Copyright &copy; 2015 Company Name. Developed by <a href="http://www.templategarden.com" rel="nofollow">Mohamed Salah</a></p>
            </div>
        </div>
    </div>
    <!-- Scripts -->

    <script src="{{ asset('website/js/app.js') }}"></script>
    <script src="{{ asset('website/js/main.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/responsive-nav.js') }}"></script>

    @yield('footer')

</body>
</html>
