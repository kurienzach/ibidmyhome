<p>Dear {{ $user->name }},</p>
<p>Pat your back, you have made one of the wisest decisions of your life! We have received your bid on www.ibidmyhome.com for the following property:-</p>
<p>Project Name: {{ $user->project->name }}</p>
<p>Unit Type : {{ $user->bid->project_unit->unit_type }} ({{ $user->bid->project_unit->area }})</p>
<p>Bid Amount: Rs {{ $user->bid->bid_value }} Per Sq ft</p>
<p>I am sure that you have taken your decision after due diligence, but you also have the option to modify your bid by logging in to your account till 16th November 2015. Our ‘Auction statistics’ tab will help you gauge the current bidding trends and increase/decrease your bid accordingly.</p>
<p>To confirm your place in the unit allotment queue, you need to give us a booking cheque of Rs 3 lakh. This will not be banked unless you get a unit of your choice at a price which you choose at the end of the auction process. One of the Developers Representative team members will get in touch with you shortly.</p>
<p>For any queries, call 08044004444.</p>
<br>
<p>Regards,<br>
Customer Support Team<br>
support@ibidmyhome.com</p>
<img src="{{ asset('img/logo.png') }}">
