@extends('payment.base')

@section('head')
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@stop

@section('header')
    @include('payment.header', ['page_id' => 2])
@stop

@section('content')

    <h2 style="text-align:center;">{{ $msg }}</h2>

    @if (isset($bookingid))
        <h3 style="text-align:center;">Booking ID - {{ $bookingid }}</h3>
    @endif

    @if (isset($txnid))
        <h3 style="text-align:center;">Transaction ID - {{ $txnid }}</h3>
    @endif

@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            //$("#payProcess").submit();
        });
    </script>
@stop

