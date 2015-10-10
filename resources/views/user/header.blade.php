<!-- Header -->
<div class="header">
<div class="header-content clearfix">
    <div class="logo"><img src="{{ asset('img/logo.png') }}"></div>

    <div class="nav-bar">
	    @if(Auth::user() == null)
	     <a href="#" class=" btn-login">Login</a>
	    @else 
	    <a href="{{ url('auth/logout') }}" class=" btn-login">Logout</a>
	    @endif

		<a href="#" class=" ">Contact Us</a>

		<a href="#" class="">Explore Projects</a>

		<a href="#" class="">About Us</a>

	</div>

</div>
</div>

<div class="spacer"></div>
