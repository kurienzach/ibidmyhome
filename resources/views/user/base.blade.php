<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <!--meta name="viewport" content="width=device-width, initial-scale=1"-->

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"-->

        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css"-->        
        
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
        <!-- // <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script> -->
        <!--script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script-->

        @section('head')
        @show

        <script>
            var modal_on_load = false;
        </script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @include('user.header')

        @yield('content')

        <!-- *********************** Modal *********************** -->
        <div id="modal-register" class="modal-container scene-hide">
            <div class="modal">
                <img class="modal-close" src="{{ asset('img/icon-close.svg') }}" alt="">
                <div class="modal-content">
                    <div class="contact-form">
                        @if (count($errors) > 0)
                        <script>
                            modal_on_load = true;
                        </script>
                        <div class="errors">
                            <p>
                            @foreach($errors->all() as $error)
                                {{ $error }} | 
                            @endforeach
                            </p>
                        </div>
                        @endif

                        <div class="left">
                            <h3 >Register for Auction</h3>
                            <p style="margin: 0; font-size: 0.7em;">To Know HDFC Realty's Minimum Base Price2Bid & obtain Bid Documents</p>
                            <form method="POST" action="{{ url('auth/register') }}">
                                {!! csrf_field() !!}
                                <input id="reg_project_id" type="hidden" name="project_id" value="{{ old('project_id') }}">
                                <input type="text" id="txtname" placeholder="Name" name="name" value="{{ old('name') }}" required>
                                <input type="email" id="txtemail" placeholder="Email ID (Will be used as username)" name="email" value="{{ old('email') }}" required>
                                <input type="password" id="txtpassword" placeholder="Enter Password" name="password" required>
                                <input type="password" id="txtcnfpassword" placeholder="Confirm Password" name="password_confirmation" required>
                                <div class="clearfix">
                                    <input class="btn-default" style="margin-top: 25px;" type="submit" name="Register" value="Register and Proceed to Payment">
                                </div>
                                <label style="display: block; font-size: 0.6em; text-align: center; margin-top: 15px;">You will be redirected to the bidding page after paying INR 549</label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- *********************** Modal *********************** -->
        <div id="modal-login" class="modal-container scene-hide">
            <div class="modal">
                <img class="modal-close" src="{{ asset('img/icon-close.svg') }}" alt="">
                <div class="modal-content">
                    <div class="contact-form">
                        @if (count($errors) > 0)
                        <script>
                            modal_on_load = true;
                        </script>
                        <div class="errors">
                            <p>
                            @foreach($errors->all() as $error)
                                {{ $error }} | 
                            @endforeach
                            </p>
                        </div>
                        @endif
                        
                        <div class="right">
                            <h3>Registered User - Sign In</h3>
                            <form method="POST" action="{{ url('auth/login') }}">
                                {!! csrf_field() !!}
                                <input type="email" id="txtemail" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                <input type="password" id="txtpassword" placeholder="Password" name="password" required>
                                <div class="clearfix">
                                    <a class="forgot-password" href="#">Forgot Password</a>
                                    <input class="btn-default" type="submit" value="Login">
                                </div>
                                <p style="text-align: left; font-size: 0.7em; color: #000; cursor: pointer;" class="modal-register-link">New to Auctions?<br>Register Urself</p>
                            </form>

                            <div class="forgot-passwd-div" style="display:none">
                                <p>Enter email to send reset link your email address</p>
                                <div class="passwd-reset clearfix">
                                <form method="POST" action="{{ url('/password/email') }}">
                                    {!! csrf_field() !!}
                                    <input type="email" id="txtforgotemail" placeholder="email" name="email" required>
                                    <input class="btn-default" type="submit" value="Reset">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @section('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-1.11.3.min.js') }}"><\/script>')</script>
        <script src="{{ asset('js/vendor/lodash.min.js') }}"></script>
        <!--script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js"></script-->
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/modal.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-68310328-1', 'auto');
	  ga('send', 'pageview');
              
        
	 (function () { 
	 var p5 = document.createElement('script'); p5.type = 'text/javascript'; 
	 p5.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'src.plumb5.com/ibidmyhome_com_1472.js'; 
	 var p5s = document.getElementsByTagName('script')[0]; p5s.parentNode.insertBefore(p5, p5s);  
	 })(); 
	 
        var modal_to_show = <?php if(!empty(old('project_id'))) print "'modal-register'"; else print "'modal-login'"; ?>;

        $(document).ready(function(){
            if (modal_on_load == true) {
                show_modal(true, modal_to_show, 475);
            }

            $('.modal-register-link').click(function() {
                show_modal(true, 'modal-register', 475);
            });

            $('.forgot-password').click(function(e) {
                $('.modal').height(475);
                $('.forgot-passwd-div').show();
                $('#txtforgotemail').focus();
                e.stopPropagation();
                return false;
            });

            $('.btn-login').click(function() {
                $('.forgot-passwd-div').hide();
                show_modal(true, 'modal-login', 375);
            });

            // Explore projects scroll to div
            $(".scroll-projects").click(function() {
                $('html, body').animate({
                    scrollTop: $("#ready-to-occupt").offset().top - 110
                }, 1000);
            });
        });
        </script>

        @show
    </body>
</html>
