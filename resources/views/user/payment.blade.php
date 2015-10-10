@extends('user.base')

@section('head')
@parent
    <link href="{{ asset('/css/payment.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/colorbox.css') }}" rel="stylesheet">
@stop

@section('content')

<div class="online_booking_form_container">
    <div class="full_width_content">

        <div class="online_booking_form_container">
            <div class="booking_head">
                <h2>Book your dream home Online <span class="flat_amt"></span></h2>
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
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <h2 class="frm_heading">
                Personal Information</h2>
                    <div class="frm_fields padbt10">
                        <div class="fl_left padr10">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-required="Name required" id="CustName" maxlength="100" name="cust_name" placeholder="Name" type="text" value="{{ $user->name or '' }}">
                        </div>
                        <div class="fl_left">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-regex="Please enter correct PAN" data-val-regex-pattern="[A-Za-z]{3}[Pp]{1}[A-Za-z]{1}\d{4}[A-Za-z]{1}" data-val-required="PAN required" id="CustPan" name="panno" placeholder="PAN (IN CAPITAL LETTERS)" type="text" value="{{ old('panno') }}">
                        </div>
                        <div style="clear: both;">
                        </div>
                    </div>
                    <div class="frm_fields padbt10">
                        <div class="fl_left padr10">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-required="The Email field is required." id="cust_mail" maxlength="100" name="cust_mail" placeholder="Email" type="text" value="{{ $user->email or '' }}">
                        </div>
                        <div class="fl_left">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-required="Phone Number required" id="cust_mobile" maxlength="15" name="cust_mobile" placeholder="Phone No." type="text" value="{{ $cust_mobile or '' }}">
                        </div>
                        <div style="clear: both;">
                        </div>
                    </div>
                    <div class="frm_fields padbt10">
                        <div class="fl_left padr10">
                            <span class="span_required">*</span>
                            <textarea class="textarea_style" cols="20" data-val="true" data-val-required="Address required" id="CustAddress" maxlength=200 name="cust_address" placeholder="Address" rows="2">{{ old('cust_address') }}</textarea>
                        </div>
                        <div class="fl_left">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-required="City required" id="CustCity" maxlength="50" name="city" placeholder="City" type="text" value="{{ old('city') }}">
                        </div>
                        <div style="clear: both;">
                        </div>
                    </div>
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
                        <div class="fl_left">
                            <span class="span_required">*</span>
                            <input class="input_style" data-val="true" data-val-required="Co-Applicant&amp;#39;s Name required" id="CustCoApplicant" maxlength="100" name="coapplicant" placeholder="Co-Applicant's Name" type="text" value="{{ old('coapplicant') }}">
                        </div>
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
                        Customers are permitted to pay only booking amount of Rs 549 for Puravankara and Provident projects towards the purchase of a unit / apartment through this online payment gateway, for which no transaction processing charges will be levied by Puravankara/Provident.
                    </p>
                    <p style="font-family: arial; font-size: 11px; line-height: 12px; color: #2e3591;">
                        Customer are permitted to cancel their booking of a unit / apartment without any penal charges, provided their cancellation request is made prior to the signing / execution of a physical application form / relevant agreements. All refund in such cases will be processed only through the online refund process.
                    </p>
                    <br>
                </div>
                <div class="action_container">
                    <input type="submit" class="btn_onlinebook" id="btnOnlineBooking" name="btnOnlineBooking" value="Proceed To Payment">
                </div>
            </form>
    </div>
</div>

<div class="footer clearfix">
          <div>© COPYRIGHT 2015. IBIDMYHOME.COM. CUSTOMER CARE: 080 444 555</div>
</div>
@stop

@section('scripts')
@parent
<script src="{{ url('js/jquery.colorbox-min.js') }}" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{ url('js/jquery.validate.unobtrusive.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    var projectId = "";
    jQuery(document).ready(function () {
        $('#ProjectID').val({{ $user->project_id }});
        jQuery('.frmOnline').submit(function (event) {
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

