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
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <p>
        Selected project : 
        {{ $user->project->name }}<br>
        Market - Base Price <span class="market_base">{{ $user->project->market_base }}</span> | Total Price <span class="market_total">{{ $user->project->market_total }}</span><br>
        Developer - Base Price <span class="dev_base">{{ $user->project->dev_base }}</span> | Total Price <span class="dev_total">{{ $user->project->dev_total }}</span><br>
        HDFC - Base Price <span class="hdfc_base">{{ $user->project->hdfc_base }}</span> | Total Price <span class="hdfc_total">{{ $user->project->hdfc_total }}</span><br>
        </p>

        Select apartment type: 
        <select id="unit_select" name="unit_type">
            <option disabled selected>Select Unit</option>
            @foreach($user->project->project_units as $unit)
            <option value="{{ $unit->id }}">{{ $unit->unit_type }} ({{ $unit->area }} sqft)</option>
            @endforeach
        </select>

        <div class="unit_details" style="display:none">
            <form method="POST" action="{{ url('bid') }}">
                {!! csrf_field() !!}
                Current highest bid : <span class="highest_bid"></span><br>
                
                <input type="hidden" class="unit_id" name="unit_id" value="">
                <input class="bid_value" type="text" name="bid_value">
                <small style="display:none" class="min_bid_error">Minimum Bid Amount is Rs. <span></span></small>

                <p class="bid_total">Rs 0</p>

                <input type="submit" value="Submit">
            </form>
        </div>
        
        <script src="{{ url('js/vendor/jquery-1.11.3.min.js') }}"></script>
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
        </script>

        <script>
            var project_units = {!! $user->project->project_units !!};

            var selected_unit = null;
            $('#unit_select').change(function() {
                unit = _.findWhere(project_units, {'id': $(this).val()});
                $unit_details = $('.unit_details');
                $unit_details.find('.unit_id').val(unit['id']);
                $unit_details.find('.highest_bid').html(unit['highest_bid']);
                $unit_details.find('.min_bid_error span').html(unit['min_bid_value']);
                selected_unit = unit;
                $unit_details.show();
                $unit_details.find('.bid_value').focus();
                $unit_details.find('.bid_value').keyup();
            });

            $('.bid_value').keyup(function() {
                bid = Number.parseInt($(this).val());
                if (!isNaN(bid)) {
                    if (bid >= selected_unit['min_bid_value']) {
                        bid_total_price = bid * unit['area'] + Number.parseInt(unit['other_charges']) + Number.parseInt(unit['govt_charges'])
                        $('.unit_details .min_bid_error').hide();
                        $('.bid_total').html('Rs ' + bid_total_price);
                    }
                    else {
                        $('.bid_total').html('Rs 0');
                        $('.unit_details .min_bid_error').show();
                    }
                }
                else {
                    $('.bid_total').html('Rs 0');   
                    $('.unit_details .min_bid_error').hide();
                }
            });

            $('form').submit(function() {
                bid = Number.parseInt($('.bid_value').val());
                if (isNaN(bid) || bid < selected_unit['min_bid_value']) {
                    return false;
                }
            });


            @if ($user->bid()->first() != null)
                $('#unit_select').val({{ $user->bid()->first()->unit_id }});
                $('.unit_details').find('.bid_value').val({{ $user->bid()->first()->bid_value }})
                $('#unit_select').change();
                $('.unit_details').find('.bid_value').keyup();
            @endif
        </script>
    </body>
</html>
