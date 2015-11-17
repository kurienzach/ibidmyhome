<p>Dear {{ $user->name }},</p>
<p>Thank you for participating in Value Auction and modifying the bid. Details of your latest bid registered with us are as below.  </p>

<ul><li>Your choice of Project     : {{ $user->project->name }}</p></li>
<li>Your apartment type        : {{ $user->bid->project_unit->unit_type }} ({{ $user->bid->project_unit->area }})</li>
<li>Your Bid Amount            : Base Price of Rs {{ $user->bid->bid_value }} per sqft (Other Charges & government taxes & deposits will be extra, depending on the type of unit you after the close of auction).</li>
<li>Bidding Restriction        : Since the properties are being sold below market price, a registered user is allowed to bid only for one property. Your last submitted bid will be treated as the final bid from you.</li></ul>
<p>One of our agents will call you shortly to collect a booking cheque of Rs 3 lakhs, so as to complete your bidding process. The Booking cheque will not be banked until the allotment of a unit of your choice, post completion of your booking formalities with the developer.
We recommend that you keep track of how the average bidding price moves during the auction by viewing the details on "Auction Statistics". You can modify your bid any time before the closure of auction by logging into iBidmyHome.com.</p>
<p>Happy Bidding and Good luck to buy your dream home below market price.</p> 
<br>

<p>Regards,<br>
Customer Support Team<br>
support@ibidmyhome.com</p>
<img src="{{ asset('img/logo.png') }}">
