<!-- Header -->
<div class="header">
<div class="header-content clearfix">
    <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}"></a></div>

    <div class="nav-bar">
	    @if(Auth::user() == null)
	     <a href="#" class=" btn-login">Login</a>
	    @else 
	    <a href="{{ url('auth/logout') }}" class="">Logout</a>
	    @endif

		<a href="{{ url('pages/contact') }}" class=" ">Contact Us</a>

		@if (Request::is('/') && Auth::check())
		<a href="{{ url('/bid') }}" class="">My Bid</a>
		@else
		<a href="{{ url('/?projects') }}" class="">Explore Projects</a>
		@endif

		<a href="{{ url('pages/about') }}" class="">About Us</a>

	</div>

</div>
</div>
<div class="spacer"></div>
