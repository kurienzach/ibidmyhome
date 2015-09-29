@extends('payment.base')

@section('head')
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@stop

@section('header')
    @include('payment.header', ['page_id' => 2])
@stop

@section('content')

    Youre are being redirected to payment gateway... Please do not press Back button or press refresh...

    <!-- Actual payment Payment form -->
    <form name="payProcess" id="payProcess" method="POST" action="https://pgi.billdesk.com/pgidsk/PGIMerchantPayment">
    <input type="hidden" name="msg" id="msg" value="{{ $msg }}">
    </form>

@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#payProcess").submit();
        });
    </script>
@stop

