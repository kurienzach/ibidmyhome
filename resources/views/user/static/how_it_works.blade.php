@extends('user.base')

@section('content')
<div style="position: relative;" >
    <img style="width: 100%;" src="{{ asset('img/how_it_works.jpg') }}" alt="">
    <div class="vid-wrapper">
    <div class="video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/DknF7HT6kW4" frameborder="0" allowfullscreen></iframe>
    </div>
    </div>
</div>
@include('user.footer')
@endsection
        
