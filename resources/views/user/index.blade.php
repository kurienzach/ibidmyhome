<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">

        <link rel="stylesheet" href="{{ url('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ url('css/main.css') }}">

        <link rel="stylesheet" href="{{ url('css/modal.css') }}">
        <script src="{{ url('js/vendor/modernizr-2.8.3.min.js') }}"></script>

        <script>
            var modal_on_load = false;
        </script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="loader hide">
            <div class="icon">
            <i class="fa fa-circle-o-notch fa-spin"></i>
            </div>
        </div>

        <!--img class="hero-img" src="{{ url('img/final_banner.jpg') }}" alt=""-->        

        <div class="content">
            <h3>EXPLORE PROJECTS</h3>
            
            <div class="project-box">
                <div class="city-list">
                    <ul>
                        
                    </ul>
                </div>    
                    
                <div class="project-list">
                    <h3>PROJECTS READY TO MOVE IN BANGALORE</h3>
                    
                    <div class="project-accordion"></div>

                </div>

                <div class="footer">
                     © COPYRIGHT 2014. PURAVANKARA PROJECTS LTD 
                </div>
            </div>
        </div>

        <!-- *********************** Modal *********************** -->
        <div class="modal-container scene-hide">
            <div class="modal">
                <img class="modal-close" src="{{ url('img/icon-close.svg') }}" alt="">
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
                            <h3>New User? Register Now</h3>
                            <form method="POST" action="{{ url('auth/register') }}">
                                {!! csrf_field() !!}
                                <input id="reg_project_id" type="hidden" name="project_id" value="{{ old('project_id') }}">
                                <input type="text" id="txtname" placeholder="name" name="name" value="{{ old('name') }}" required>
                                <input type="email" id="txtemail" placeholder="email" name="email" value="{{ old('email') }}" required>
                                <input type="password" id="txtpassword" placeholder="password" name="password" required>
                                <input type="password" id="txtcnfpassword" placeholder="retype password" name="password_confirmation" required>
                                <input class="btn-default" type="submit" name="Register" value="Register">
                            </form>
                        </div>

                        <div class="right">
                            <h3>Sign In</h3>
                            <form method="POST" action="{{ url('auth/login') }}">
                                {!! csrf_field() !!}
                                <input type="email" id="txtemail" placeholder="email" name="email" value="{{ old('email') }}" required>
                                <input type="password" id="txtpassword" placeholder="password" name="password" required>
                                <div class="clearfix">
                                    <a class="forgot-password" href="#">Forgot Password</a>
                                    <input class="btn-default" type="submit" value="Login">
                                </div>
                            </form>

                            <div class="forgot-passwd-div" style="display:none">
                                <p>Enter email to reset your password</p>
                                <div class="passwd-reset clearfix">
                                    <input type="email" id="txtforgotemail" placeholder="email" name="email" required>
                                    <button class="btn-default" type="button">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- *********************** Templates *********************** -->
        <script type="text/template" id="project-template">
        <div class="project">
            <div class="accordion-header">
                <h4><%=location%> - <%=city%> | <%=name%></h4>
                <div class="icons">
                    <i class="fa fa-plus-circle"></i>
                    <i class="fa fa-minus-circle"></i>
                </div>
            </div>
            <div class="accordion-body clearfix">
                <div class="left">
                    <img src="{{ url('img/') }}/<%=image_url%>" alt="">
                    <% if (banner_text != "") { %>
                        <p class="banner"><%=banner_text%></p>
                    <% } %>
                </div>

                <div class="right">
                    <div class="project-desc">
                        <strong style="text-transform: uppercase;"><%=name%></strong><br>
                        <%=description%>
                    </div>
                    <div><strong>Market - Base Price : <span><%=market_base%></span> | Total Price : <span><%=market_total%></span></strong></div>
                    <div><strong>Developer - Base Price : <span><%=dev_base%></span> | Total Price : <span><%=dev_total%></span></strong></div>
                    <div class="button-bar">
                        <% if (video_url != "") { %>
                        <a href="#"><i class="fa fa-play-circle-o"></i> View Video</a>
                        <% } if (brochure_url != "") { %>
                        <a href="#"><i class="fa fa-file-text-o"></i> View Brochure</a>
                        <% } %>
                        <a class="buy-coupon" data-project-id="<%=id%>" href="#"><i class="fa fa-tag"></i> Buy Coupon</a>
                    </div>
                </div>
            </div>
        </div>
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ url('js/vendor/jquery-1.11.3.min.js') }}"><\/script>')</script>
        <script src="{{ url('js/vendor/lodash.min.js') }}"></script>
        <script src="{{ url('js/modal.js') }}"></script>
        <script src="{{ url('js/main.js') }}"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');

            var projects = {!! $projects !!};

            $(document).ready(function() {

                render_cities();

                if (modal_on_load == true) {
                    show_modal(true);
                }

                $('.forgot-password').click(function(e) {
                    $('.forgot-passwd-div').show();
                    $('#txtforgotemail').focus();
                    e.stopPropagation();
                });
            });
        </script>
    </body>
</html>
