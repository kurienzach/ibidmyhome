@extends('user.base')

@section('content')
@include('user.slider')


<div class="content">


    <h3 style="text-align: center; margin: 40px auto;font-weight:normal" id="ready-to-occupt">READY TO OCCUPY HOMES UNDER VALUE AUCTION</h3>
    </br>
    
    <div class="project-box">
        <div class="city-list">
            <ul class="clearfix">
                
            </ul>
        </div>
           
       <div class="project-list">
            <div class="float-customer-care">
                <img src="{{ asset('img/contact.png') }}">
            </div>
                        
            <div class="project-accordion"></div>     
        

        </div>

    </div>

</div>
<div style="height: 100px;"></div>
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
            <%  if (banner_text!= "") { %>
                <a href="<%=banner_text%>" target="_blank">View Auction Statistics</a>
                <% } %>
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
                <p class="text" style="width:300px">Base Price for similar projects in market </p> <p >: <%=market_base%></p>
            </div>
            <div class="price-field clearfix">
                <p class="text" style="width:300px">Developer&#39;s Current Base Price </p><p class="value">: <%=dev_base%></p>
            </div>
            <div class="price-field clearfix">
<p class="text"style="width:300px">HDFC Realty’s Reserve Price Recommendation </p><p class="value">: <%=hdfc_base%></p>
                <p class="text"  style="width:300px"> (Minimum Base Price to bid)</p>
           </div>
           
            <div class="button-bar">
           
                @if(!Auth::check())
                <a class="buy-coupon" data-project-id="<%=id%>" href="#" ><i class="fa fa-tag" align="right"></i> Register to Bid Now</a>
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

    
    

    $(document).ready(function() {
        //$('.banner').unslider({
        //    speed: 500,               //  The speed to animate each slide (in milliseconds)
        //    delay: 5000,              //  The delay between slide animations (in milliseconds)
        //    dots: true,
        //    fluid: true              //  Support responsive design. May break non-responsive designs
        //});

        render_cities();

        if (getUrlParameter('projects')) {
            $('html, body').animate({
                scrollTop: $("#ready-to-occupt").offset().top - 110
            }, 1000);
        }
        
        if (getUrlParameter('city')) {
            $('#city-' + getUrlParameter('city')).click();
        }

    });
</script>
@endsection
