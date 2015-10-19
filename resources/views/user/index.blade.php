@extends('user.base')

@section('content')
@include('user.slider')

<div class="content">
    <h3 style="text-align: center; margin: 40px auto;font-weight:normal" id="ready-to-occupt">READY TO OCCUPY HOMES UNDER VALUE AUCTION</h3>
    
    <div class="project-box">
        <div class="city-list">
            <ul class="clearfix">
                
            </ul>
        </div>
           
       <div class="project-list">
            <div class="float-customer-care">
                Customer Support : 080-44555555
            </div>
                        
            <div class="project-accordion"></div>     
        

        </div>

    </div>

</div>
<div style="height: 80px;"></div>
@include('user.footer')


<!-- *********************** Templates *********************** -->
<script type="text/template" id="project-template">
<div class="project expand">
    <!--div class="accordion-header">
        <h4><%=location%>, <%=city%> | <%=name%></h4>
        <div class="icons">
            <i class="fa fa-plus-circle"></i>
            <i class="fa fa-minus-circle"></i>
        </div>
    </div-->
   
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
                <%  if (brochure_url != "") { %>
                <a href="<%=brochure_url%>" target="_blank">View Brochure</a>
                <% } %>
            </div>
        </div>

        <div class="right">
            <h4><%=location%>, <%=city%> | <%=name%></h4>
            <div class="project-desc">
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
                @if(!Auth::check())
                <a class="buy-coupon" data-project-id="<%=id%>" href="#" ><i class="fa fa-tag"></i> Register For Auction</a>
                @endif
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

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };
    

    $(document).ready(function() {
        $('.banner').unslider({
            speed: 500,               //  The speed to animate each slide (in milliseconds)
            delay: 5000,              //  The delay between slide animations (in milliseconds)
            dots: true,
            fluid: true              //  Support responsive design. May break non-responsive designs
        });

        render_cities();

        if (getUrlParameter('projects')) {
            $('html, body').animate({
                scrollTop: $("#ready-to-occupt").offset().top - 110
            }, 1000);
        }

    });
</script>
@endsection
