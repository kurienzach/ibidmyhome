@extends('user.base')

@section('head')
@parent
    <title>Payment Error!!! - IBidMyHome</title>
@stop

@section('content')
<div class="content" style="text-align: center;">
    <h3>An error occured during your payment!!!</h3>

    <br> 

    <a href="{{ url('/') }}" class="btn-default" style="margin-left: 20px;">Goto Payment Page</a>    
</div>
@endsection
        
