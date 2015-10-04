<h2>A new registration for Project : {{ $booking->project()->first()->name }} has been done

<h3>Booking Details</h3>

<p>Customer Name : {{ $booking->cust_name }},</p>
<p>Customer Mobile : {{ $booking->cust_mobile }},</p>
<p>Customer email : {{ $booking->cust_mail }},</p>
<p>Project Name : {{ $booking->project()->first()->name }}</p>
<p>Amount Paid : {{ $booking->amount }}</p>

<br>

<p>Please check the admin page to see full details of the booking</p>