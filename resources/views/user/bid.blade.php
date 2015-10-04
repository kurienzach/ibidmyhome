@extends('user.base')

@section('head')
@parent
<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content">
    <div class="project-box">
        <div class="city-list">
            @if ($user->bid()->first() != null)
            <h3>My Bid for Base Price - Rs {{ $user->bid->bid_value }} psqft + Other Charges</h3>
            @else
            <h3>My Bid for Base Price</h3>
            @endif
        </div>    
            
        <div class="project-list">
            <br>
            <div class="project-accordion">
                <?php $project = $user->project; ?>
                <div class="project expand">
                    <div class="accordion-header">
                        <h4>{{ $project->location }} - {{ $project->city }} | {{ $project->name }}</h4>
                        
                    </div>
                    <div class="accordion-body clearfix">
                        <div class="left">
                            <img src="{{ asset('img/' . $project->image_url) }}" alt="">
                            <div class="button-bar" style="text-align: center;">
                                @if ($project->video_url != "")
                                <a href="{{ $project->video_url }}"><i class="fa fa-play-circle-o"></i> Video</a>
                                @endif

                                @if ($project->brochure_url != "")
                                <a href="{{ $project->brochure_url }}"><i class="fa fa-file-text-o"></i> Brochure</a>
                                @endif
                            </div>
                        </div>

                        <div class="right">
                            <div class="project-desc">
                                <strong style="text-transform: uppercase;">{{ $project->name }}</strong><br>
                                {!! $project->description !!}
                            </div>

                            <div class="price-field clearfix">
                                <p class="text">Base Price prevailing in the market for similar projects</p> <p class="value">: {{ $project->market_base }}</p>
                            </div>
                            <div class="price-field clearfix">
                                <p class="text">Developers Base Price</p> <p class="value">: {{ $project->dev_base }}</p>
                            </div>
                            <div class="price-field highlight clearfix">
                                <p class="text">HDFC reality's "BEST VALUE PRICE"</p> <p class="value">: {{ $project->hdfc_base }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-body bid-box clearfix">
                        <div class="left">
                            <div class="current-highest-bid">
                                Select an apartment type to place bid
                            </div>
                        </div>

                        <div class="right">
                            <select id="unit_select" name="unit_type">
                                <option disabled selected>Select Apartment Type</option>
                                @foreach($user->project->project_units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_type }} ({{ $unit->area }} sqft)</option>
                                @endforeach
                            </select>

                            <div class="unit_details" style="display:none; padding-top: 20px; ">
                                <form method="POST" action="{{ url('bid') }}" class="bid-form">
                                    {!! csrf_field() !!}
                                    
                                    <input type="hidden" class="unit_id" name="unit_id" value="">
                                    <small style="" class="min_bid_error">Minimum Bid Amount is Rs. <span></span></small><br>
                                    <input class="bid_value" type="text" name="bid_value" placeholder="my bid value" style="margin-bottom: 15px;"> <label style="margin-left: 10px; font-weight: 700;">psqft</label>

                                    <div style="display:none">
                                    <p class="other_charges">Other Govt. Charges : Rs <span></span></p>
                                    <p class="stat_charges">Statutory Charges : Rs <span></span></p>
                                    <p class="bid_total" style="font-weight: 700;">TOTAL : Rs <span>0</span></p>
                                    </div>
                                    
                                    @if ($user->bid != null)
                                    <input class="btn-default" style="displaY: block;margin-bottom: 15px;" type="submit" value="Modify">
                                    @else
                                    <input class="btn-default" style="displaY: block;margin-bottom: 15px;" type="submit" value="Submit">
                                    @endif

                                    <p style="color: #565656; font-size: 0.9em; margin-top: 30px;">Disclaimer: All prices are indicative based on unit type, exact prices will be based on final unit selection later.</p>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div style="height: 50px;"></div>

                </div>


            </div>
            <!-- .project-accordion -->
                
        </div>

        <br>
    </div>
    <!--.project-box-->

    @include('user.footer')

</div>
@endsection       
      
@section('scripts')
@parent
<script src="{{ asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>

<script>
    var project_units = {!! $user->project->project_units !!};

    var selected_unit = null;
    $('#unit_select').change(function() {
        unit = _.findWhere(project_units, {'id': $(this).val()});
        $unit_details = $('.unit_details');
        $unit_details.find('.unit_id').val(unit['id']);
        $('.current-highest-bid').html(unit['highest_bid']);
        $unit_details.find('.min_bid_error span').html(unit['min_bid_value']);
        $unit_details.find('.other_charges span').html(unit['govt_charges']);
        $unit_details.find('.stat_charges span').html(unit['other_charges']);
        selected_unit = unit;
        $unit_details.show();
        // $unit_details.find('.bid_value').focus();
        $unit_details.find('.bid_value').keyup();
    });

    $('.bid_value').keyup(function() {
        bid = Number.parseInt($(this).val());
        if (!isNaN(bid)) {
            if (bid >= selected_unit['min_bid_value']) {
                bid_total_price = bid * unit['area'] + Number.parseInt(unit['other_charges']) + Number.parseInt(unit['govt_charges'])
                // $('.unit_details .min_bid_error').hide();
                $('.bid_total span').html(bid_total_price);
            }
            else {
                $('.bid_total span').html('0');
                // $('.unit_details .min_bid_error').show();
            }
        }
        else {
            $('.bid_total span').html('0');   
            // $('.unit_details .min_bid_error').hide();
        }
    });

    $('form').submit(function() {
        bid = Number.parseInt($('.bid_value').val());
        if (isNaN(bid) || bid < selected_unit['min_bid_value']) {
            return false;
        }
    });


    $(document).ready(function() {
        @if ($user->bid()->first() != null)
            $('#unit_select').val({{ $user->bid()->first()->unit_id }});
            $('.unit_details').find('.bid_value').val({{ $user->bid()->first()->bid_value }})
            $('#unit_select').change();
            $('.unit_details').find('.bid_value').keyup();
        @endif

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
