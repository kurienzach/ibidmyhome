<!-- Header -->
<div class="header">
<div class="header-content clearfix">
    <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('img/logo-ibid.png') }}"></a></div>

    <div class="nav-bar">
	    @if(Auth::user() == null)
	     <a href="#" class=" btn-login">Login</a>
	    @else 
	    <a href="{{ url('auth/logout') }}" class="">Logout</a>
	    @endif

		<a href="{{ url('pages/contact') }}" class=" ">Contact Us</a>

		
		<a href="{{ url('/?projects') }}" class="">View Properties</a>
		@if (Auth::check())
		<a href="{{ url('/bid') }}" class="">My Bid</a>
		@endif

		<a href="{{ url('pages/about') }}" class="">About Us</a>

	</div>

</div>
</div>
<div class="spacer"></div>
