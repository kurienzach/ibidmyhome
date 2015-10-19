<p>Dear {{ $user->name }},</p>
<p>PFB your modified bid details </p>
<p>Project Name: {{ $user->project->name }}</p>
<p>Unit Type : {{ $user->bid->project_unit->unit_type }} ({{ $user->bid->project_unit->area }})</p>
<p>Bid Amount: Rs {{ $user->bid->bid_value }} per sq ft</p>

<p>I am sure that you have taken your decision after due diligence, but you also have the option to modify your bid again by logging in to your account till 16th November 2015. Our ‘Auction statistics’ tab will help you gauge the current bidding trends and increase/decrease your bid accordingly.</p>
<p>To complete your Bidding Process, you need to give us a reservation cheque of INR 3 lakh. This will not be banked unless you get a unit of your choice at a price which you choose at the end of the auction process.</p>
<p>For any queries, call 08044004444.</p>
<br>
<p>Regards,<br>
Customer Support Team<br>
support@ibidmyhome.com</p>
<img src="{{ asset('img/logo.png') }}">
