@extends('layouts.layout')

@section('content')


<div class="container">

    <div class="row">
        <div class="col s12 l8 offset-l1 center">
            <span class="indigo-text" style="font-style: italic">{{session("msg")}}</span>
        </div>
    </div>
    <container class="cards">`
        @foreach ($art as $artItem)

        <div class="card">
            <div class="card-image">
                <img class="materialboxed" src="https://i.pinimg.com/originals/db/00/ab/db00abcf6c5909bf4763f8c30fbe1701.jpg" alt="">
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