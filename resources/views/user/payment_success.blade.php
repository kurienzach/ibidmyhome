@extends('user.base')

@section('head')
@parent
<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content" style="text-align: center;">
    <h3>Your payment has been processed successfully</h3>

    <br> 

    <a href="{{ asset('bidding_doc.pdf') }}" class="btn-default">Download Bid Document</a>

    <a href="{{ asset('bid_details.pdf') }}" class="btn-default bid-details" style="margin-left: 20px;">Details of Bids Received</a>

    <hr style="width: 50%; margin: 40px auto;">

    <a href="{{ url('/') }}" class="btn-default" style="margin-left: 20px;">Place Your Bid Online</a> 
    
    <h5 style="margin: 10px auto;"> OR </h5>

    <a href="{{ asset('hdfc_doc.pdf') }}" class="btn-default" style="margin-bottom: 20px;">Submit your Bid to HDFC Realty</a>

    <p><small>Place your Bid online or Download bid document and submit to HDFC Realty Executives on or before 12th November 2015<small></p>
    
</div>
@endsection

@section('scripts')
@parent
<script src="{{ asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>

<script>
	$('small').click(function() {
		swal({   title: 'Hello',   text: 'This is a sample modal' , confirmButtonColor: '#DC903B'});
	});
</script>
@endsection
        
