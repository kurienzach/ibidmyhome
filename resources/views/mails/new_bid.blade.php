<h2>A new bid for Project : {{ $user->project->name }} has been done

<h3> PFB the Bid Details</h3>

<p>Customer Name : {{ $user->name }},</p>
<p>Customer Mobile : {{ $user->mobile }},</p>
<p>Customer email : {{ $user->email }},</p>
<p>Project Name : {{ $user->project->name }}</p>
<p>Unit Type : {{ $user->bid->project_unit->unit_type }} ({{ $user->bid->project_unit->area }})</p>
<p>Bid Value : {{ $user->bid->bid_value }}</p>
<br>
<p>Please check admin panel for complete details</p>
