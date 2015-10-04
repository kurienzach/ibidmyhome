@extends('user.base')

@section('content')
<div class="content" style="text-align: center;">
    <h3>Your payment has been processed successfully</h3>

    <br> 

    <a href="{{ asset('bidding_doc.pdf') }}" class="btn-default">Download Bid Document</a>

    <a href="{{ url('/') }}" class="btn-default" style="margin-left: 20px;">Place Your Bid Online</a>

    <p><small>Place your Bid online or Download bid document and submit to HDFC Realty Executives on or before 12th November 2015<small></p>
    
</div>
@endsection
        
