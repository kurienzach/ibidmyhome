@extends('user.base')

@section('content')
<div class="content" style="text-align: center;">
    <div style="height: 50px;"></div>
    <div class="project-box">
        <div class="city-list">
            <ul class="clearfix">
                <li><a class="select">Contact Us</a></li>
            </ul>
        </div>
           
       <div class="project-list">
            <div class="float-customer-care">
                Customer Support : 080-44559966 
            </div>
                        
            <div class="project-accordion">
                <div class="project" style="text-align: left; padding: 40px 60px 80px; font-size: 0.9em; color: #818181">
                    <p style="margin: 0; font-weight: 700; padding-left: 30px;">To contact Developer's Sales Representative :</p>
                    <p style="margin:5px; font-size: 0.9em;"><i style="margin-right: 12px" class="fa fa-envelope"></i> Email us : puravankara@ibidmyhome.com  |  sobha@ibidmyhome.com</p>
                    <p style="margin: 5px; font-size: 0.9em;"><i style="margin-right: 15px" class="fa fa-phone"></i> Phone no : 080-44559966 </p>
                    <div style="height: 40px;"></div>
                    <p style="margin: 0; font-weight: 700; padding-left: 30px;">To contact HDFC Realty's Sales Representative :</p>
                    <p style="margin: 5px; font-size: 0.9em;"><i style="margin-right: 12px" class="fa fa-envelope"></i> Email id : valueauctions@hdfcrealty.com</p>
                    <p style="margin: 5px; font-size: 0.9em;"><i style="margin-right: 15px" class="fa fa-phone"></i> Phone no : 022-67221919</p>
                </div>

            </div>     
        


        </div>

    </div>
</div>
@include('user.footer')
@endsection
        
