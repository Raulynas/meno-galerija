@extends('layouts.layout')

@section('content')


<div class="container">

    <div class="row">
        <div class="col s12 l8 offset-l1 center">
            <span class="indigo-text" style="font-style: italic">{{session("msg")}}</span>
        </div>
    </div>
    <form class="search">
        <input type="text" class="form-control m-auto" name="search" placeholder="search arts">
    </form>
    <container class="cards">
        @foreach ($art as $artItem)
        <div class="card">
            <div class="card-image">
                @if(count($artItem->images) > 0)
                <img class="materialboxed" src="{{asset('img/'. $artItem->images[0]->name)}}" alt="">
                @else
                <img class="materialboxed" src="{{asset('img/default.jpg')}}" alt="">
                @endif
            </div>
            <div class="card-content left">
                <div class="card-title">
                    <span>{{$artItem->title}}</span>
                </div>
                <div class="description grey-text left">
                    <b>Description:</b><br>
                    <span>{{$artItem->description}}</span>

                </div>
                <div class="categories grey-text left">
                    <ul>
                        <b>Categories:</b><br>
                        @foreach ($artItem->categories as $category)
                        <span>{{$category->name}}</span>
                        @endforeach
                    </ul>

                </div>
            </div>

        </div>

        @endforeach

    </container>
</div>



@endsection