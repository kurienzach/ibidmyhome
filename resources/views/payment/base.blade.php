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
        <link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,700,500' rel='stylesheet' type='text/css'>
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

        <script src="{{ asset('js/jquery-1.11.0.js') }}"></script>
        
        @yield('head')
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
       
    </head>
    
    <body>
        
    @yield('header')
        
    <div class="content" style="margin-top: 20px">
        <div class="container">
        	@yield('content')
        </div>
    </div>
      
    <div style="height: 50px"></div>
    
    <div id="Footer_panel_bg">
        <div id="Footer_panel">
            <div id="Privacy_Copyright_Design_Panel" style="margin-top: 30px;">
                <div id="Copywright">
                    © Copyright 2015. Provident Housing Ltd
                </div>
                <div id="Privacy">
                    <ul>
                        <li><a href="http://www.puravankara.com/pages/Privacy_Policy" target="_blank">Privacy Policy</a>
                        </li>
                        <li>|</li>
                        <li><a href="http://www.puravankara.com/pages/Disclaimer" target="_blank">Disclaimer</a>
                        </li>
                    </ul>
                </div>
                <div id="Design">
                    Powered by: <a href="http://www.banded.co" target="_blank">Banded.co</a>
                </div>
            </div>
        </div>
    </div>

    </body>
    
    @yield('scripts')

</html>
