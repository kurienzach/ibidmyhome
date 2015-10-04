<p>Dear {{ $booking->cust_name }},</p>
<p>Your registration for {{ $booking->project()->first()->name }} is successfull. Please find the registration details</p>
<p>Project Name : {{ $booking->project()->first()->name }}</p>
<p>Amount Paid : {{ $booking->amount }}</p>