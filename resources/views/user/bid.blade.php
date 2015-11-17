@extends('user.base')

@section('head')
@parent
<title>My Bid - IBidMyHome</title>
<link href="{{ asset('/css/minimal/minimal.css') }}" rel="stylesheet">
@endsection

@section('content')
@include('user.slider-half')
<div class="content">
    <div class="project-box">

        <div style="height: 40px"></div>

        <div class="city-list">
        	<ul class="clearfix">
        		<li><a class="select" href="#">My Bid</a></li>
        		<li><a href="{{ asset('/docs/Bid Document.pdf') }}" target="_blank">View Bid Document</a></li>
        		<li><a href="{{ asset('/docs/Homes 2 bid for.pdf') }}" target="_blank">View Homes on Auction</a></li>
        		<li><a href="{{ url('/pages/stats') }}" target="_blank">View Auction Statistics</a></li>
        	</ul>
        </div>

        <div class="project-list">
            <div class="float-customer-care">
                <img src="{{ asset('img/contact.png') }}">
            </div>
            <div class="project-accordion">
                <?php $project = $user->project; ?>

                <div class="bid-box clearfix">
                    <div class="left">
                        <h3>My Bid</h3>
                        <div class="current-bid clearfix">
                            <div class="text">Project</div>
                            <div class="value">: {{ $user->project->name }}</div>
                        </div>
                        <div class="current-bid clearfix">
                            <div class="text">Location</div>
                            <div class="value">: {{ $user->project->location }}</div>
                        </div>
                        <div class="current-bid clearfix">
                            <div class="text">Unit Type</div>
                            @if($user->bid != null)
                            <div class="value">: {{ $user->bid->project_unit->unit_type }} ({{ $user->bid->project_unit->area }} )</div>
                            @else
                            <div class="value">: </div>
                            @endif
                        </div>
                        <div class="current-bid clearfix">
                            <div class="text">Bid Amount</div>
                            @if($user->bid != null)
                            <div class="value">: Rs {{ $user->bid->bid_value }} per sqft + Other Charges</div>
                            @else
                            <div class="value">: </div>
                            @endif
                        </div>
                    </div>

                    <div class="right">
                        <form action="{{ url('/bid') }}" class="unit_details" method="post">
                        {!! csrf_field() !!}
                        <h3>Place / Modify Your Bid</h3>
                        <div class="form-group clearfix">
                            <div class="text">Project</div>
                            <div class="value">
                                <select name="project_id" id="project_select">
                                    @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->location }}, {{ $project->city }} | {{ $project->name }}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="text">Unit Type</div>
                            <select name="unit_id" id="unit_select">
                                <option disabled>Select a Project</option>
                            </select>
                        </div>

                        <div>
                        <div class="form-group clearfix" style="margin: 30px 0;">
                            <p style="width: 395px;">Would you prefer a Higher floor apartment</p>
                            <input type="radio" name="higher_floor" value="yes">&nbspYes&nbsp&nbsp
                            <input type="radio" name="higher_floor" value="no">&nbspNo
                        </div>
                        <div class="form-group clearfix" style="margin: 30px 0;">
                            <p style="width: 395px;">Would you prefer an apartment with premium view</p>
                            <input type="radio" name="premium_view" value="yes">&nbspYes&nbsp&nbsp
                            <input type="radio" name="premium_view" value="no">&nbspNo
                        </div>
                        </div>

                        <div class="form-group clearfix">
                            <div class="text">My Bid</div>
                            <div class="value">
                                <input type="text" name="bid_value" placeholder="Bid Value" class="bid_value">
                                <p style="margin-left: 10px;">per sq ft</p>
                            </div>
                        </div>
                        
                        @if ($user->bid == null)
                        <input class="btn btn-default" type="submit" value="SUBMIT">
                        @else
                        <input class="btn btn-default" type="submit" value="MODIFY">
                        @endif

                        <p style="margin-left: 20%;"><a href="{{ asset('/docs/Pricing break up.pdf') }}" target="_blank" style="font-size: 0.7em; text-decoration: none; color: #1F4181;">Before placing your bid, Click here to understand about other charges</a></p>
                        </form>
                    </div>
                </div>

            </div>
            <!-- .project-accordion -->
                
        </div>

        <br>
    </div>
    <!--.project-box-->
<p><a style="font-size: 0.7em; text-decoration: none; color: #1F4181;">Please note that you can modify your project or bid or both at any point-in-time and any number of times. However, only one bid is permitted for every registration and only the last chosen project and bid will be considered for the Value Auction.</a></p>

</div>
<div style="height: 80px;"></div>
@include('user.footer')

@endsection       
      
@section('scripts')
@parent
<script src="{{ asset('/js/vendor/icheck.min.js') }}" type="text/javascript"></script>

<script>
    var project_units = {!! $units !!};
    var selected_unit = null;

    // On selection of project populate the unit select
    $("#project_select").change(function() {
        $unit_select = $('#unit_select');
        $unit_select.empty();
        project = project_units[$(this).val()];
        $('.bid_value').attr('placeholder', "Bid Value");
        $('.bid_value').val('');

        $unit_select.append('<option selected disabled>Select Unit</option>')
        _.each(project, function(unit){
            $unit_select.append('<option value="' + unit['id'] + '">' + unit['unit_type'] + ' (' + unit['area'] + ')</option>')
        });
    });

    // On selection of a unit type store details of unit in selected_unit for future use / validation
    $('#unit_select').change(function() {
        selected_unit = _.findWhere(project_units[$('#project_select').val()], {id: parseInt($(this).val())});
        $('.bid_value').attr('placeholder', "HDFC Reality's Min Base Price Rs " + selected_unit['min_bid_value']);
        $('.bid_value').val('');
    });

    $('form.unit_details').submit(function() {
        // Validations before form submit
        console.log
        // Check if a valid unit is selected
        if ($('#unit_select').val() == null) {
            swal('', 'Please select Unit Type and Enter bid value to place bid');
            return false;
        }

        bid = parseInt($('.bid_value').val());
        if (isNaN(bid)) {
            swal({   title: '',   text: 'Invalid Bid Value' , confirmButtonColor: '#1F4181'});
            return false;
        }
        else if (bid < selected_unit['min_bid_value']) {
            swal({   title: '',   text: 'Oops! Your bid is below the HDFC Realty’s Minimum Base Price to bid of Rs ' + selected_unit['min_bid_value']  + ' per sqft. Please re-bid with a higher amount.' , confirmButtonColor: '#1F4181'});
            return false;
        }
        else if (bid > selected_unit['max_bid_value']) {
            swal({   title: '',   text: 'Oops! Your bid is above the Developer’s Current base price of Rs ' + selected_unit['max_bid_value']  + ' per sqft. Please re-bid with a lower amount.' , confirmButtonColor: '#1F4181'});
            return false;
        }
    });


    $(document).ready(function() {
        //$('.banner').unslider({
        //    speed: 500,               //  The speed to animate each slide (in milliseconds)
        //    delay: 5000,              //  The delay between slide animations (in milliseconds)
        //    dots: true,
        //    fluid: true              //  Support responsive design. May break non-responsive designs
        //});

        $('input:radio').iCheck({
           checkboxClass: 'icheckbox_minimal',
           radioClass: 'iradio_minimal',
           increaseArea: '20%' // optional
         });

        $('#project_select').val({{ $user->project_id }});
        // Trigger a project select change to render inital value for unit select
        $('#project_select').change();

        @if ($user->bid()->first() != null)
            $('#unit_select').val({{ $user->bid()->first()->unit_id }});
            $('#unit_select').change();
            $('.unit_details').find('.bid_value').val({{ $user->bid()->first()->bid_value }})

            @if ($user->bid->higher_floor == 1)
                $('input[name="higher_floor"][value="yes"]').iCheck('check');
            @elseif ($user->bid->higher_floor == -1)
                $('input[name="higher_floor"][value="no"]').iCheck('check');
            @endif

            @if ($user->bid->premium_view == 1)
                $('input[name="premium_view"][value="yes"]').iCheck('check');
            @elseif ($user->bid->premium_view == -1)
                $('input[name="premium_view"][value="no"]').iCheck('check');
            @endif

        @endif

        // Code to show modal window if msg set from the server
        @if (Session::has('alert'))
            @if (Session::has('alert-title'))
                swal({   title: '{{ Session::get('alert-title') }}',   text: '{{ Session::get('alert') }}' , confirmButtonColor: '#DC903B'});
            @else
                swal('', '{{ Session::get('alert') }}');
            @endif
        @endif
    });
</script>
@endsection
                            
                            