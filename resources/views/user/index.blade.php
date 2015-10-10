@extends('user.base')

@section('content')
@include('user.slider')
<!-- <img class="hero-img" src="{{ asset('img/banner.jpg') }}" alt="" style="margin-top: -30px;"> -->

<div class="content">
    <h3 style="text-align: center; margin: 40px auto;font-weight:normal">READY TO MOVE IN PROJECTS UNDER VALUE AUCTION</h3>
    
    <div class="project-box">
        <div class="city-list">
            <ul>
                
            </ul>
        </div>
           
       <div class="project-list">
      
                        
            <div class="project-accordion"></div>     
        

        </div>

    </div>

    @include('user.footer')
</div>


<!-- *********************** Modal *********************** -->
<div id="modal-register" class="modal-container scene-hide">
    <div class="modal">
        <img class="modal-close" src="{{ asset('img/icon-close.svg') }}" alt="">
        <div class="modal-content">
            <div class="contact-form">
                @if (count($errors) > 0)
                <script>
                    modal_on_load = true;
                </script>
                <div class="errors">
                    <p>
                    @foreach($errors->all() as $error)
                        {{ $error }} | 
                    @endforeach
                    </p>
                </div>
                @endif

                <div class="left">
                    <h3 >Register for Auction</h3>
                    <p style="margin: 0; font-size: 0.7em;">To Know HDFC Realty's Minimum Price2Bid & obtain Bid Documents</p>
                    <form method="POST" action="{{ url('auth/register') }}">
                        {!! csrf_field() !!}
                        <input id="reg_project_id" type="hidden" name="project_id" value="{{ old('project_id') }}">
                        <input type="text" id="txtname" placeholder="Name" name="name" value="{{ old('name') }}" required>
                        <input type="email" id="txtemail" placeholder="Email" name="email" value="{{ old('email') }}" required>
                        <input type="password" id="txtpassword" placeholder="Password" name="password" required>
                        <input type="password" id="txtcnfpassword" placeholder="Retype Password" name="password_confirmation" required>
                        <div class="clearfix">
                            <input class="btn-default" style="margin-top: 25px;" type="submit" name="Register" value="Register and Proceed to Payment">
                        </div>
                        <label style="display: block; font-size: 0.6em; text-align: center; margin-top: 15px;">You will be redirected to the bidding page after paying INR 549</label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- *********************** Modal *********************** -->
<div id="modal-login" class="modal-container scene-hide">
    <div class="modal">
        <img class="modal-close" src="{{ asset('img/icon-close.svg') }}" alt="">
        <div class="modal-content">
            <div class="contact-form">
                @if (count($errors) > 0)
                <script>
                    modal_on_load = true;
                </script>
                <div class="errors">
                    <p>
                    @foreach($errors->all() as $error)
                        {{ $error }} | 
                    @endforeach
                    </p>
                </div>
                @endif
                
                <div class="right">
                    <h3>Sign In</h3>
                    <form method="POST" action="{{ url('auth/login') }}">
                        {!! csrf_field() !!}
                        <input type="email" id="txtemail" placeholder="Email" name="email" value="{{ old('email') }}" required>
                        <input type="password" id="txtpassword" placeholder="Password" name="password" required>
                        <div class="clearfix">
                            <a class="forgot-password" href="#">Forgot Password</a>
                            <input class="btn-default" type="submit" value="Login">
                        </div>
                    </form>

                    <div class="forgot-passwd-div" style="display:none">
                        <p>Enter email to send reset link your email address</p>
                        <div class="passwd-reset clearfix">
                        <form method="POST" action="{{ url('/password/email') }}">
                            {!! csrf_field() !!}
                            <input type="email" id="txtforgotemail" placeholder="email" name="email" required>
                            <input class="btn-default" type="submit" value="Reset">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- *********************** Templates *********************** -->
<script type="text/template" id="project-template">
<div class="project">
 <div class="accordion-header">
      <p> </p>
        <h4><%=location%> - <%=city%> | <%=name%></h4>
        <div class="icons">
            <i class="fa fa-plus-circle"></i>
            <i class="fa fa-minus-circle"></i>
        </div>
    </div>
   
    <div class="accordion-body clearfix">
        <div class="left">
            <img src="{{ asset('img/') }}/<%=image_url%>" alt="">
            <!--<% if (banner_text != "") { %>
                <p class="banner"><%=banner_text%></p>
            <% } %>-->

            <div class="button-bar1">
                <% if (video_url != "") { %>
                <a href="<%=video_url%>" target="_blank">Watch Video</a>
                <% }%>
            </div>
            <div class="button-bar1">
                <%  if (brochure_url != "") { %>
                <a href="<%=brochure_url%>" target="_blank">View E_Brochure</a>
                <% } %>
            </div>
        </div>

        <div class="right">
            <div class="project-desc">
                <strong style="text-transform: uppercase;"><%=name%></strong><br>
                <%=description%>
            </div>

            <div class="price-field clearfix">
                <p class="text" style="width:330px">Base Price for similar projects in the market </p> <p >: <%=market_base%></p>
            </div>
            <div class="price-field clearfix">
                <p class="text" style="width:330px">Developer&#39;s Current Base Price </p><p class="value">: <%=dev_base%></p>
            </div>
            <div class="price-field clearfix">
                <p class="text"style="width:330px">To know HDFC Realty’s Minimum Base Price2Bid  </p><p class="value">: Register for Auction</p>
           </div>
            <div class="button-bar">
                <a class="buy-coupon" data-project-id="<%=id%>" href="#" ><i class="fa fa-tag"></i> Register For Auction</a>
            </div>
        </div>
    </div>
</div>
</script>

@endsection

@section('scripts')
@parent
<script>
    var projects = {!! $projects !!};
    var modal_to_show = <?php if(!empty(old('project_id'))) print "'modal-register'"; else print "'modal-login'"; ?>;

    $(document).ready(function() {
        $('.banner').unslider({
            speed: 500,               //  The speed to animate each slide (in milliseconds)
            delay: 3000,              //  The delay between slide animations (in milliseconds)
            dots: true,
            fluid: true              //  Support responsive design. May break non-responsive designs
        });

        render_cities();

        if (modal_on_load == true) {
            show_modal(true, modal_to_show);
        }

        $('.forgot-password').click(function(e) {
            $('.forgot-passwd-div').show();
            $('#txtforgotemail').focus();
            e.stopPropagation();
            return false;
        });

        $('.btn-login').click(function() {
            show_modal(true, 'modal-login');
        });
    });
</script>
@endsection
