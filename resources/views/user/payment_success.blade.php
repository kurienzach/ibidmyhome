@extends('user.base')

@section('head')
@parent
    <title>Payment Success - IBidMyHome</title>
@stop

@section('head')
@parent
<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content" style="text-align: center;">
    <h3 style="margin:70px 0;">Your payment has been successfully processed</h3>

    <br> 

    <!--a href="{{ asset('/docs/sample.pdf') }}" target="_blank" class="btn-default">Download Bid Document</a>

    <a href="{{ asset('/docs/sample.pdf') }}" target="_blank" class="btn-default bid-details" style="margin-left: 20px;">Details of Bids Received</a>

    <hr style="width: 50%; margin: 40px auto;"-->

    <a href="{{ url('/bid') }}" class="btn-default" style="margin-left: 20px;">Proceed to Bid</a> 
    
    <!--h5 style="margin: 10px auto;"> OR </h5>

    <a href="#" class="btn-default hdfc-submit" style="margin-bottom: 20px;">Submit your Bid to HDFC Realty</a>

    <p><small>Place your Bid online or Download bid document and submit to HDFC Realty Executives on or before 16th November 2015</small></p-->
    
</div>
@include('user.footer')
@endsection

@section('scripts')
@parent
<script src="{{ asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>

<script>
	//$('.hdfc-submit').click(function() {
	//	swal({   title: '',   text: 'HDFC Contact : 080-44555555' , confirmButtonColor: '#1F4181'});
	//});
</script>
@endsection
        
