<h2>A New Registration for Project : {{ $booking->project->name }} has been done

<h3>Booking details</h3>
<p>Customer Name : {{ $booking->cust_name }},</p>
<p>Customer Mobile : {{ $booking->cust_mobile }},</p>
<p>Customer Email : {{ $booking->cust_mail }},</p>
<p>Project Name : {{ $booking->project->name }},</p>
<p>Amount paid : {{ $booking->amoung }}</p>
<br>
<p>Please check the admin panel to see full details of the booking</p>