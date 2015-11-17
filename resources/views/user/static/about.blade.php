@extends('user.base')

@section('content')
<div class="banner">
    <ul class="clearfix">
        <li>
            <img src="{{ asset('img/Landing-page_1920-x210.jpg') }}" >
        </li>
        
    </ul>
</div>
<div class="content" style="text-align: center;">
    <div style="height: 50px;"></div>
    <div class="project-box">
        <div class="city-list">
            <ul class="clearfix">
                <li><a class="select">About Us</a></li>
            </ul>
        </div>
           
       <div class="project-list">
            <div class="float-customer-care">
                Customer Support : 080-44555555
            </div>
                        
            <div class="project-accordion" style="font-size: 0.9em;">
                <div class="project" style="text-align: left; padding: 40px 60px 80px; font-size: 0.9em; color: #818181">
                    <p style="text-align: justify;">ibidmyhome.com is India's first, multi-property online auction portal created with an objective of bringing in a transparent price discovery methodology to the Indian Real Estate.  Founded in 2015, at ibidmyhome.com our objective is to bring in technology led, disruptive innovations into the Real Estate Space.</p>

                    <p style="text-align: justify;">ibidmyhome.com will offer projects from various Grade A Real Estate Developer’s across product categories and cities across India, and act as a 'Transaction Platform' between Institutional sellers of high repute  and retail buyers, before eventually moving into the  C2C space. Auctions will be our fundamental tool to aggregate demand for properties through our platform. End2End online auctions or partially online auctions, such as the ongoing Value Auctions initiative, will drive purchase transactions and not act as mere property enquiry tools. New products such as Reverse Auction, Blind Auction, Open Auction are currently under-development and we believe these new tools will strengthen consumer confidence for investments into the Indian real estate by ensuring that retail buyers, buy right.</p>

                    <img style="width: 100%; margin: 10px 0;" src="{{ asset('img/Landing-page_1920-x210.jpg') }}">

                    <p style="text-align: justify;">Taking a cue from the increasing behavioural shift of buyers moving their home search online, out attempt at ibidmyhome.com, is to aggregate demand online for sellers and deliver a price point at which larger number of transactions can potentially be consummated under a single window. The aggregation of demand, lowers cost and time to achieve a specific volume of sale, thereby offering an opportunity for retail buyers to buy homes at significantly better values, than those that prevail in the market at any given point of time.</p>

                    <p style="text-align: justify;">Auctions across the world are considered as one of the most transparent methods for buyers and sellers to transact in Real Estate and is specifically favoured by buyers, as it gives them an opportunity to buy prime, pre-screened real estate at off-market prices. Thoughtful features like pre-screening of projects / developers, real time auction statistics, online bid submissions, neutral property advisors of high repute (such as HDFC Realty, International Real Estate Advisor's)  are all assigned to further help buyers take more informed decisions. The empowering feeling of "Choosing a Price to Bid & Buy', we believe, will enable aggregation of buyers and propel transactions. The business motive however is driven by an unwavering commitment to offer to retail buyers only Prime, High Quality Real Estate Properties.</p>

                    <p style="text-align: justify;">ibidmyhome.com is building a high quality team of research analysts and technology professionals to serve the increasing interest it has received from institutional real estate developers. We welcome both words of advices and / or business enquiries from technocrats, general industry observers and real estate developers to be sent to us at <a href="mailto:partners@ibidmyhome.com" target="_top">partners@ibidmyhome.com</a></p>
              
                </div>

            </div>     
        


        </div>

    </div>
</div>
<div style="height: 50px;"></div>
@include('user.footer')
@endsection
        
