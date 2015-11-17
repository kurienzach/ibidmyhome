<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        
        <meta name="description" content="">
        <!--meta name="viewport" content="width=device-width, initial-scale=1"-->

        <link rel="apple-touch-icon" href="{{ asset('img/home.png') }}">
        <!-- Place favicon.ico in the root directory -->

        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"-->

        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css"-->        
        
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
        
        <link rel="stylesheet" href="{{ asset('/css/intlTelInput.css') }}">
        <link href="{{ asset('/css/colorbox.css') }}" rel="stylesheet">
        
        <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
        <!-- // <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script> -->
        <!--script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script-->

        @section('head')
        @show
	<title>iBidMyHome</title>
        <script>
            var modal_on_load = false;
        </script>
        
        <style>
            .left .intl-tel-input {
                margin-top: 20px;
                width: 100%;
            }
            .left .intl-tel-input input{
                width: 100%;
            }
        </style>
    </head>
    <body>
    	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-K6M3KC"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-K6M3KC');</script>
	<!-- End Google Tag Manager -->
    
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
                            <h3 >Register to Bid Now</h3>
			    <div class="clearfix" style="height: 50px;">
		                <img style="height: 100%; float: left" src="{{ asset('img/hdfc_logo.png') }}" alt="">
		                <img style="height: 100%; float: right" src="{{ asset('img/logo.png') }}" alt="">
		            </div>
                            <form id="frmregister" method="POST" action="{{ url('auth/register') }}">
                                {!! csrf_field() !!}
                                <input id="reg_project_id" type="hidden" name="project_id" value="{{ old('project_id') }}">
                                <input type="text" id="txtname" placeholder="Name" name="name" value="{{ old('name') }}" required>
                                <input type="email" id="txtemail" placeholder="Email ID (Will be used as username)" name="email" value="{{ old('email') }}" required>
                                <input type="tel" id="txtmobile" placeholder="Mobile No" name="mobile" value="{{ old('mobile') }}" required>
                                <input type="password" id="txtpassword" placeholder="Enter Password" name="password" required>
                                <input type="password" id="txtcnfpassword" placeholder="Confirm Password" name="password_confirmation" required>
                                <div class="clearfix">
                                    <input class="btn-default" style="margin-top: 25px;" type="submit" name="Register" value="Submit">
                                </div>
                                <label style="display: block; font-size: 0.6em; text-align: center; margin-top: 15px;"> </label>
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
			    <div class="clearfix" style="height: 50px;">
		                <img style="height: 100%; float: left" src="{{ asset('img/hdfc_logo.png') }}" alt="">
		                <img style="height: 100%; float: right" src="{{ asset('img/logo.png') }}" alt="">
		            </div>
                            <form method="POST" action="{{ url('auth/login') }}">
                                {!! csrf_field() !!}
                                <input type="email" id="txtemail" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                <input type="password" id="txtpassword" placeholder="Password" name="password" required>
                                <div class="clearfix">
                                    <a class="forgot-password" href="#">Forgot Password</a>
                                    <input class="btn-default" type="submit" value="Login">
                                </div>
                                <p style="text-align: left; font-size: 0.7em; color: #000; cursor: pointer;" class="modal-register-link">New to Auctions?<br>Register Yourself</p>
                            </form>

                            <div class="forgot-passwd-div" style="display:none">
                                <p>Enter email to send reset link your email address</p>
                                <div class="passwd-reset clearfix">
                                <form id="forgot-pass" method="POST" action="{{ url('/password/email') }}">
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

        <!-- Packelite Chat -->
        <div id="lhc_status_container_page" ></div>
         
        <!-- Place this tag after the Live Helper Plugin tag. -->
        <script type="text/javascript">
        var LHCChatOptions = {};
        LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
        (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        var refferer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
        var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
        po.src = '//packelite.in/chat2client/index.php/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true?r='+refferer+'&l='+location;
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
        </script>

        @section('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-1.11.3.min.js') }}"><\/script>')</script>
        <script src="{{ asset('js/vendor/lodash.min.js') }}"></script>
        <!--script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js"></script-->
        <script src="{{ url('js/intlTelInput.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('js/jquery.colorbox-min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/modal.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/vai.js') }}"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-68310328-1', 'auto');
	  ga('send', 'pageview');
              
        
	 //(function () { 
	 //var p5 = document.createElement('script'); p5.type = 'text/javascript'; 
	 //p5.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'src.plumb5.com/ibidmyhome_com_1472.js'; 
	 //var p5s = document.getElementsByTagName('script')[0]; p5s.parentNode.insertBefore(p5, p5s);  
	 //})(); 
	 
	var getUrlParameter = function getUrlParameter(sParam) {
	        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
	            sURLVariables = sPageURL.split('&'),
	            sParameterName,
	            i;
	
	        for (i = 0; i < sURLVariables.length; i++) {
	            sParameterName = sURLVariables[i].split('=');
	
	            if (sParameterName[0] === sParam) {
	                return sParameterName[1] === undefined ? true : sParameterName[1];
	            }
	        }
        };
	 
        var modal_to_show = <?php if(!empty(old('project_id'))) print "'modal-register'"; else print "'modal-login'"; ?>;

        $(document).ready(function(){
            if (modal_on_load == true) {
                if (modal_to_show === "modal-register") 
                    show_modal(true, modal_to_show, 560);
                else
                    show_modal(true, modal_to_show, 465);
            }
            
            $("#txtmobile").intlTelInput({
                defaultCountry: "IN",
                preferredCountries: ["in", "us"],
                utilsScript: "{{ asset('js/utils.js') }}"
            });

            $('.modal-register-link').click(function() {
                show_modal(true, 'modal-register', 560);
            });

            $('.forgot-password').click(function(e) {
                $('.modal').height(545);
                $('.forgot-passwd-div').show();
                $('#txtforgotemail').focus();
                e.stopPropagation();
                return false;
            });

            $('.btn-login').click(function() {
                $('.forgot-passwd-div').hide();
                show_modal(true, 'modal-login', 465);
            });
            
            jQuery('#frmregister').submit(function (event) {
                if (!$("#txtmobile").intlTelInput("isValidNumber")) {
                    event.preventDefault();
                    jQuery.colorbox({
                        html: '<p class="ConverterText">Please enter a valid mobile number with country code</p>'
                    });
                    return false;
                }

                $("#txtmobile").val($("#txtmobile").intlTelInput("getNumber"));

            });
            
	    @if (Session::has('reset_confirm'))
	    	swal({   title: '',   text: 'Password reset mail send successfully. Please check your email for further instructions' , confirmButtonColor: '#1F4181'});
	    @endif

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
