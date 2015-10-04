@extends('user.base')

@section('content')

    <div class="content" style="text-align: center;">
        Youre are being redirected to payment gateway... Please do not press Back button or press refresh...
    </div>

    <!-- Actual payment Payment form -->
    <form name="payProcess" id="payProcess" method="POST" action="https://pgi.billdesk.com/pgidsk/PGIMerchantPayment">
    <input type="hidden" name="msg" id="msg" value="{{ $msg or '' }}">
    </form>

@stop

@section('scripts')
@parent
    <script>
        $(document).ready(function() {
            $("#payProcess").submit();
        });
    </script>
@stop

