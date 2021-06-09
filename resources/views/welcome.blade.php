@extends('layouts.layout')
@section('content')

<div class="container center" style="margin-top: 50px; margin-bottom: 50px;">
    <div>
        <a class="btn orange darken-1" href="{{ route('login') }}">Login</a>
    </div>
</div>
<div class="parallax-container">
    <div class="parallax">
        <img src="https://www.shbarcelona.com/blog/en/wp-content/uploads/2017/09/art-gallery-810x529.jpg"
            alt="stars" class="responsive-img">
    </div>

</div>

@endsection