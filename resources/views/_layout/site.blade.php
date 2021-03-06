<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/img/logo-min.png"/>
    <!-- <meta id="token" name="token"   content="{{ csrf_token() }}" property="csrf_token"/>  -->
    <meta id="token" property="csrf_token" content="{{ csrf_token() }}"/>

    @if(is_null($meta = SEO::render()) || empty($meta = SEO::render()))
        <title>@yield('title','Falcon Scientific Editing')</title>
        <meta name="description" content="@yield('description')"/>
        <meta name="keywords" content="@yield('keywords')"/>
        <meta property="og:title" content="@yield('title')"/>
        <meta property="og:description" content="@yield('description')"/>
        <meta name="twitter:title" content="@yield('title')"/>
        <meta name="twitter:description" content="@yield('description')"/>
    @else
        {!! $meta !!}
    @endif

    <meta property="og:type" content="website"/>
    <meta property="og:image" content="@yield('avatar', Config::get('app.url').'/img/logo.jpg')"/>
    <meta name="twitter:image:src" content="@yield('avatar',  Config::get('app.url').'/img/logo.jpg')"/>
    <!-- <meta name="language" content="{{App::getLocale()}}"/> -->
    <!--  <meta property="og:locale" content="{{App::getLocale()}}"/> -->


    <link rel="stylesheet" href="{{elixir('build/css/app.css')}}" type="text/css"/>
    <script src="{{elixir('build/js/app.js')}}" type="text/javascript"></script>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,400italic,500italic,300italic&subset=latin,cyrillic'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300&subset=latin,cyrillic' rel='stylesheet'
          type='text/css'>


    <link rel="alternate" hreflang="en-us" href="{{url('/en')}}"/>
    <link rel="alternate" hreflang="ru-ru" href="{{url('/ru')}}"/>

    <meta name='yandex-verification' content='475490f46162a6e2'/>
    <meta name="google-site-verification" content="fQ49WVkHhim6L6m0tdBt2o2g6onG49bX-ih_rmLXJNs"/>
    <meta name="baidu-site-verification" content="D4x671AWJV"/>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="test-rows">


<div id="loader-wrapper">
    <img id="loader-logo" src="/img/logo.png" class="img-responsive" alt="loader">

    <div id="loader"></div>
</div>


<div class="topline">

</div>


<div class="container">


    <div class="row">
        <div class="col-md-7 col-sm-12 text-center">

            <div class="icon-info-top navbar-form navbar-left hidden-xs">

                <a href="skype:+79802665074?call"><img src="/img/icon/phone-icon-300.png" class="icon-top" alt="Phone">
                    <b> +7(980)266-5074</b></a>

                <a href="mailto:contact@falconediting.com"><img src="/img/icon/email-icon-300.png" class="icon-top"
                                                                alt="Email">
                    contact@falconediting.com</a>

                <a href="skype:falconediting?call"><img src="/img/icon/skype-icon-300.png" class="icon-top" alt="Skype">
                    falconediting</a>

            </div>
        </div>


        <div class="col-md-5 hidden-sm hidden-xs">

            <form class="navbar-form navbar-right right-top-menu"
                  action="{{URL::route(App::getLocale().'.search.index')}}">

                <div class="input-group">

              <span class="input-group-btn">
              <button class="btn btn-default" type="submit">
                  <span class="glyphicon glyphicon-search"></span>
              </button>
             </span>
                    <input type="text" name="search" placeholder="{{trans('main.Search')}} ..." class="form-control">
                </div>

                <a href="{{url('/en')}}" class="flag @if(App::getLocale() == 'en') active @endif">
                    <img src="/img/lang/eng.png">
                </a>
                <a href="{{url('/ru')}}" class="flag @if(App::getLocale() == 'ru') active @endif">
                    <img src="/img/lang/rus.png">
                </a>
            </form>
        </div>

    </div>


    <nav class="navbar navbar-default">

        <div class="navbar-header col-xs-12 col-md-6">
            <a class="navbar-brand2" href="/">
                <img src="/img/logo_{{App::getLocale()}}.png" class="img-responsive" alt="Falcon Scientific Editing">
            </a>

            <h1 class="logo-text">
                {{trans("main.text-logo")}}
            </h1>
            <button type="button" class="navbar-toggle collapsed but-menu-top" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav  navbar-right">
                @if(App::getLocale() == 'en')
                    {!! Menu::getLI('english-top-menu') !!}
                @else
                    {!! Menu::getLI('russian-top-menu') !!}
                @endif



                @if(!Auth::check())
                    <li class="hidden-sm hidden-md hidden-lg">
                        <a href="/auth/login">{{trans('main.sign')}}</a>
                    </li>
                @else
                    <li class="hidden-sm hidden-md hidden-lg">
                        <a href="/auth/login"> {{trans('main.userhome')}}</a>
                    </li>
                    <li class="hidden-sm hidden-md hidden-lg">
                        <a href="/auth/logout/">{{trans('main.logout')}}</a>
                    </li>
                @endif


                <li class="text-right hidden visible-xs @if(App::getLocale() == 'en') active @endif"><a
                            href="{{url('/en')}}">English</a></li>
                <li class="text-right hidden visible-xs @if(App::getLocale() == 'ru') active @endif"><a
                            href="{{url('/ru')}}">Русский</a></li>


                @if(!Auth::check())
                    <li class="login-a  hidden-sm hidden-xs"><a
                                href="/auth/login">@if(!Auth::check()) {{trans('main.sign')}} @else
                                {{trans('main.panel')}} @endif</a></li>
                @endif

                <li class="dropdown hidden-sm hidden-xs">


                    @if(Auth::check())
                        <a id="drop1" href="#" role="button" class="btn btn-link dropdown-toggle"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">

                            {{trans('main.panel')}}

                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="drop1">
                            <li>
                                <a href="/auth/login">
                                    @if(!Auth::check())
                                        {{trans('main.sign')}}
                                    @else
                                        @if(Auth::user()->checkRole('admin'))
                                            {{trans('main.dashboard')}}
                                        @elseif(Auth::user()->checkRole('user'))
                                            {{trans('main.userhome')}}
                                        @elseif(Auth::user()->checkRole('editor'))
                                            {{trans('main.editorhome')}}
                                        @endif
                                    @endif
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/auth/logout/">{{trans('main.logout')}}</a></li>
                        </ul>
                    @endif

                </li>


            </ul>

        </div>

    </nav>


    @if (count($errors) > 0)
        <script>
            swal({
                title: "{{trans('alert.Error')}}",
                text: "<ul class='w-xxl block-center'>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>",
                html: true,
                type: "warning",
            });
        </script>
    @endif




    @if (Session::has('good'))
        <script>
            swal("{{trans('alert.Success')}}", "{{Session::get('good')}}", "success")
        </script>
    @elseif(Session::has('bad'))
        <script>
            swal("{{trans('alert.Error')}}", " {{Session::get('bad')}}", "warning")
        </script>
    @endif


</div>


@yield('content')


<footer id="footer">

    <div class="bg-white">
        <div class="container">
            <div class="row padding-footer">
                <div class="col-sm-3 col-xs-6 hidden-sm hidden-xs">
                    <h4>{{trans('footer.mission')}}</h4>

                    <p>
                        {{trans('footer.about')}}
                    </p>
                </div>
                <div class="col-sm-3  col-xs-12">
                    <h4>{{trans('footer.contacts')}}</h4>

                    <ul class="menu-footer-contact">
                        <li><a href="skype:+79802665074?call"> <img src="/img/icon/phone-icon-m.png" alt="Phone">
                                +7(980)266-5074</a>
                        </li>
                        <li><a href="mailto:contact@falconediting.com"><img src="/img/icon/email-icon-m.png"
                                                                            alt="Email">
                                contact@falconediting.com</a></li>
                        <li><a href="skype:falconediting?call"> <img src="/img/icon/skype-icon-m.png" alt="Skype">
                                falconediting</a>
                        </li>
                    </ul>


                    <div class="p-t-15">

                        <a href="https://www.facebook.com/FalconScientificEditing" target="_blank" class="no-hover"
                           rel="nofollow">
                            <img src="/img/social/fb-icon.png" alt="Facebook">
                        </a>

                        <a href="https://twitter.com/FalconEditing" target="_blank" class="no-hover" rel="nofollow">
                            <img src="/img/social/twitter-icon.png" alt="Twitter">
                        </a>

                        <a href="https://plus.google.com/u/0/115410796310646309979" target="_blank" class="no-hover"
                           rel="nofollow">
                            <img src="/img/social/google-icon.png" alt="Google Plus">
                        </a>

                        <a href="https://www.linkedin.com/company/falcon-scientific-editing" class="no-hover"
                           target="_blank"
                           rel="nofollow">
                            <img src="/img/social/in-icon.png" alt="Linkedin">
                        </a>

                        <a href="http://vk.com/falconediting" target="_blank" class="no-hover" rel="nofollow">
                            <img src="/img/social/vk-icon.png" alt="VK">
                        </a>

                        <a href="http://www.ok.ru/group/53590836838626" target="_blank" class="no-hover" rel="nofollow">
                            <img src="/img/social/ok-icon.png" alt="OK">
                        </a>

                    </div>


                </div>
                <div class="col-sm-3 hidden-sm hidden-xs">
                    <h4>{{trans('footer.navigation')}}</h4>

                    <ul class="menu-footer ">
                        @if(App::getLocale() == 'en')
                            {!! Menu::getLI('english-footer-menu') !!}
                        @else
                            {!! Menu::getLI('russian-footer-menu') !!}
                        @endif
                    </ul>

                </div>
                <div class="col-sm-3  hidden-sm hidden-xs">
                    <h4 class="text-u-c m-b font-thin">{{trans('footer.payment')}}</h4>
                    <img src="/img/pay.png" class="img-responsive" alt="{{trans('footer.payment')}}">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light dk">
        <div class="container">
            <div class="row padder-v m-t">
                <div class="col-xs-6">
                    © 2015 - {{ date("Y")}}, Falcon Scientific Editing
                </div>
                <div class="col-xs-6 text-right">
                    <p>{{trans('footer.octavian')}} <span class="text-right"><a
                                    href="http://octavian48.ru" target="_blank"><img src="/img/octavian.png"
                                                                                     alt="{{trans('footer.octavian')}}"></a></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="b-panel-subscribe col-sm-12 hidden-xs">
    <div class="col-sm-10 col-sm-offset-1">



        <div class="subscribe-block">
            <div class="col-sm-6 v-center">
                <i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>
                <span>{{trans('main.subscription-text')}}</span>
            </div>

            <div class="col-sm-6">
                <form method="post" action="/subscribe" id="subscribe">
                    <input type="email" name="email" placeholder="{{trans('main.subscrption-email')}}" required>
                    <button type="submit">{{trans('main.subscription')}}</button>
                </form>
            </div>
        </div>


    </div>


    <div class="col-sm-1 text-right">
        <a href="#" id="subscribe-close"><i class="fa fa-times" aria-hidden="true"></i></a>
    </div>


</div>


<script src="/build/js/flipclock.min.js"></script>

<script>


    window.onload = function () {
        $("#loader-wrapper").hide();
    };


    $(document).ready(function () {
        if ($.cookie('subscribe') != 'subscribe') {
            $('.b-panel-subscribe').show();
        }

        $('#subscribe').submit(function () {
            $.cookie('subscribe', 'subscribe', {
                expires: 7,
                path: '/'
            });
        });


        $('#subscribe-close').click(function () {
            $('.b-panel-subscribe').hide();
            $.cookie('subscribe', 'subscribe', {
                expires: 7,
                path: '/'
            });
        });


    });


    $(document).ready(function () {
        $('.carousel-inner div.item:first-child').addClass('active');
        $('.carousel').carousel('pause');
    });



    var byRow = $('body').hasClass('test-rows');
    $('.items-container').each(function() {
        $(this).children('.item').matchHeight({
            byRow: byRow
        });
    });
    /*
    $('.main-samples').each(function() {
        $(this).addClass('p-a');
    });
*/







    $("form").submit(function (event) {
        $("#loader-wrapper").show('slow');
    });


    $('.img-hover').hover(function () {
        var old = $(this).attr('src');
        $(this).attr('src', $(this).attr('data-altimg'));
        $(this).attr('data-altimg', old);

        console.log('hover');
    }, function () {

        var old = $(this).attr('src');
        $(this).attr('src', $(this).attr('data-altimg'));
        $(this).attr('data-altimg', old);

    });


    $('.scroll-top').click(function () {
        var body = $("html, body");
        body.stop().animate({scrollTop: 0}, '100', 'swing', function () {
        });
    });


</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript"> (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter33384898 = new Ya.Metrika({
                    id: 33384898,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: true
                });
            } catch (e) {
            }
        });
        var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () {
            n.parentNode.insertBefore(s, n);
        };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/33384898" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript><!-- /Yandex.Metrika counter -->


<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-65069943-14', 'auto');
    ga('send', 'pageview');

</script>


@widget('modals')

<link rel="stylesheet" href="/build/css/flipclock.css">

</body>
</html>
