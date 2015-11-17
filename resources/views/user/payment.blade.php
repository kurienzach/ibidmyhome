@extends('user.base')

@section('head')
@parent
    <title>Payment - IBidMyHome</title>
    <link href="{{ asset('/css/payment.css') }}" rel="stylesheet">
@stop

@section('content')
<!--h3 style="text-align: center; margin: 40px auto;font-weight:normal" id="ready-to-occupt">Register to Bid. Pay Rs.549 (FULLY REFUNDABLE)</h3-->
<div class="online_booking_form_container">
    <div class="full_width_content">

        <div class="online_booking_form_container">
            <div class="booking_head">
                <h2>Register to Bid. Pay Rs.549 (FULLY REFUNDABLE) <span class="flat_amt"></span></h2>
            </div>
     	    <div class="clearfix" style="height: 50px; margin-top: 20px;">
		<img style="height: 100%; float: left" src="{{ asset('img/hdfc_logo.png') }}" alt="">
		<img style="height: 100%; float: right" src="{{ asset('img/logo.png') }}" alt="">
	    </div>
            <form action="{{ url('/payment/process')}}" class="frmOnline" method="post" novalidate="novalidate">
                <div class="frm_container">
                    {!! csrf_field() !!}

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div style="clear: both; height: 15px;">
                    </div>


                    <h2 class="frm_heading"> Project Information</h2>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <div class="frm_fields clearfix" style="margin-bottom: 10px;">
                        <div class="fl_left padr10" style="width:100%">
                            <span class="span_required">*</span>

                            <select class="filed_select" data-val="true" data-val-required="*" style="width:100%" id="ProjectID" name="project_id">
                                @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->location }}, {{ $project->city }} | {{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fl_left padr10" style="width:100%">
                                                        <span class="span_required" style="">*</span>
                            <select class="filed_select" data-val="true" data-val-required="*" style="width:100%" id="heard_src" name="heard_src">
                                <option disabled selected>You heard about us from</option>
                                <option value="Referred by Customer">Referred by Customer</option>
                                <option value="Real Estate Agent">Real Estate Agent</option>
                                <option value="HDFC Realty">HDFC Realty</option>  
                                <option value="Prop Finder">Prop Finder </option> 
                                <option value="ICICI Home search">ICICI Home Search</option> 
                                <option value="Prop Tiger">Prop Tiger</option>
                                 <option value="India Homes">India Homes</option>
                                  <option value="Hanu Reddy Realty">Hanu Reddy Realty</option> 
                                <option value="Developer’s Sales Team">Developer’s Sales Team</option>                                                                
                                <option value="Advertisements/Others">Advertisements/Others</option>
                                <option value="SMC Real Estate Advisors">SMC Real Estate Advisors</option>
                            </select>
                        </div>
                        <div class="frm_fields padbt10 heard_div" style="display:none">
                            <div class="fl_left padr10">
                                                        <span class="span_required" style="color: #FBFBFC">*</span>
                                <input class="input_style" id="heard_field1" maxlength="100" name="heard_field1" placeholder="Name" type="text" value="">
                            </div>
                            <div class="fl_left">
                                                        <span class="span_required" style="color: #FBFBFC">*</span>
                                <input class="input_style" id="heard_field2" maxlength="100" name="heard_field2" placeholder="Mobile No" type="text" value="">
                            </div>
                            <div style="clear: both;">
                            </div>
                        </div>
                    </div>


                    <h2 class="frm_heading">
                Personal Information</h2>
                    <div class="frm_fields padbt10">
                        <div class="fl_left padr10">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-required="Name required" id="CustName" maxlength="100" name="cust_name" placeholder="Name" type="text" value="{{ $user->name or '' }}">
                        </div>
                        <!--div class="fl_left">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-regex="Please enter correct PAN" data-val-regex-pattern="[A-Za-z]{3}[Pp]{1}[A-Za-z]{1}\d{4}[A-Za-z]{1}" data-val-required="PAN required" id="CustPan" name="panno" placeholder="PAN (IN CAPITAL LETTERS)" type="text" value="{{ old('panno') }}">
                        </div-->
                        <div class="fl_left">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-required="The Email field is required." id="cust_mail" maxlength="100" name="cust_mail" placeholder="Email" type="text" value="{{ $user->email or '' }}">
                        </div>
                        <div style="clear: both;">
                        </div>
                    </div>
                    <div class="frm_fields padbt10">
                        <div class="fl_left padr10">
                            <span class="span_required">*</span>
                            <input id="phone-no" class="input_style" data-val="true" data-val-required="Phone Number required" id="cust_mobile" maxlength="15" name="cust_mobile" placeholder="Phone No." type="tel" value="{{ $user->mobile or '' }}">
                        </div>
                        <div class="fl_left">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-required="City required" id="CustCity" maxlength="50" name="city" placeholder="City" type="text" value="{{ old('city') }}">
                        </div>
                        <div style="clear: both;">
                        </div>
                    </div>
                    <!--div class="frm_fields padbt10">
                        <div class="fl_left padr10">
                            <span class="span_required">*</span>
                            <textarea class="textarea_style" cols="20" data-val="true" data-val-required="Address required" id="CustAddress" maxlength=200 name="cust_address" placeholder="Address" rows="2">{{ old('cust_address') }}</textarea>
                        </div>
                        
                        <div style="clear: both;">
                        </div>
                    </div-->
                    <div class="frm_fields padbt10">
                        <div class="fl_left padr10">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-required="Pin Code required" id="CustPincode" maxlength="20" name="pincode" placeholder="Pincode" type="text" value="{{ old('pincode') }}">
                        </div>
                        <div class="fl_left">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-required="State required" id="CustState" maxlength="50" name="state" placeholder="State" type="text" value="{{ old('state') }}">
                        </div>
                        <div style="clear: both;">
                        </div>
                    </div>
                    <div class="frm_fields padbt10">
                        <div class="fl_left padr10">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-required="Country required" id="CustCountry" maxlength="50" name="country" placeholder="Country" type="text" value="{{ old('country') }}">
                        </div>
                        <!--div class="fl_left">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-required="Co-Applicant&amp;#39;s Name required" id="CustCoApplicant" maxlength="100" name="coapplicant" placeholder="Co-Applicant's Name" type="text" value="{{ old('coapplicant') }}">
                        </div-->
                        <div style="clear: both;">
                        </div>
                    </div>
                    <div style="clear: both; height: 15px;">
                    </div>
                </div>

                <div class="agreement_container frm_fields" style="margin-top: 20px;">
                    <label class="lblAgreement">
                        <input data-val="true" data-val-required="The Terms&amp;amp;Conditions field is required." id="AgreedTerms" name="AgreedTerms" type="checkbox" value="true">
                        <input name="AgreedTerms" type="hidden" value="false"> I agree to <a href="#">Terms &amp; Conditions</a>
                    </label>
                </div>
                <div style="margin-bottom: 10px;">



                    <p style="font-family: arial; font-size: 11px; line-height: 12px; color: #2e3591; margin-bottom: 10px;">
                        Customers are permitted to pay only Rs.549 which is a fully refundable deposit in order to participate in the bidding process, on iBidmyHome.com, through this online payment gateway. There will be no transaction processing charges levied on the registration fee.
                    </p>
                    <p style="font-family: arial; font-size: 11px; line-height: 12px; color: #2e3591;">
                        The Rs.549 deposit is fully refundable, without any penal charges, in case the bid is disqualified, i.e., lower than the cut-off value or if the customer chooses not to participate in the bidding process after paying the registration amount or in case customers fail to send the booking amount cheque before the cut-off date. Customer can choose not to participate in the bidding process at any time by send mail to support@ibidmyhome.com. The Rs.549 Deposits will be refunded through the online refund process on or before 31st January 2016 without any penal charges.
                    </p>
                    <br>
                </div>
                <div class="action_container">
                    <input type="submit" class="btn_onlinebook" id="btnOnlineBooking" name="btnOnlineBooking" value="Proceed to Bid (Rs.549 FULLY REFUNDABLE)">
                </div>
            </form>
    </div>
</div>
</div>
<div style="height: 80px;"></div>
@include('user.footer');
@stop

@section('scripts')
@parent
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{ url('js/jquery.validate.unobtrusive.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="http://js.waybeo.com/v0.1-beta2/waybeo.min.js"></script>
<script type="text/javascript">
    var projectId = "";

    $('#heard_src').change(function() {
        if ($(this).val() == "Advertisements/Others") {
            $('.heard_div').hide();
        }
 	else {
            $('.heard_div').show();   
        }
 	
    });

    jQuery(document).ready(function () {
        $('#ProjectID').val({{ $user->project_id }});
        
        $("#cust_mobile").intlTelInput({
            defaultCountry: "IN",
            preferredCountries: ["in", "us"],
            utilsScript: "{{ asset('js/utils.js') }}"
        });
        
        
	@if (Session::has('newpayment'))
        	console.log('call');
	        Waybeo.LeadResponder.Init({
			hash: '55bef2bad2efc',
		});
		
		Waybeo.LeadResponder.MakeCall({
			'hash': '55bef2bad2efc',
			'route_hash': '563c521cdc61d',
			'callerid_hash': '563c525f61e52',
			'contact_number': '{{ $user->mobile }}',
			'optional_params': {
				name: '{{ $user->name }}',
				email: '{{ $user->email }}',
			}
		});
	@endif
        
        jQuery('.frmOnline').submit(function (event) {
            if (!$("#cust_mobile").intlTelInput("isValidNumber")) {
                event.preventDefault();
                jQuery.colorbox({
                    html: '<p class="ConverterText">Please enter a valid mobile number with country code</p>'
                });
                return false;
            }

            $("#cust_mobile").val($("#cust_mobile").intlTelInput("getNumber"));
            
            if (!jQuery('#AgreedTerms').is(':checked')) {
                event.preventDefault();
                jQuery.colorbox({
                    html: '<p class="ConverterText">You have to submit all the necessary details and accept Terms and Conditions</p>'
                });
            }
        });
    });
</script>
@stop
