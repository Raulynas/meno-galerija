@extends('layouts.layout')

@section('content')


<div class="container">

    <div class="row">
        <div class="col s12 l8 offset-l1 center">
            <span class="indigo-text" style="font-style: italic">{{session("msg")}}</span>
        </div>
    </div>
    <container class="cards">
        @foreach ($userArt as $artItem)

        <div class="card">
            <div class="card-image">
                <img class="materialboxed"
                    src="https://i.pinimg.com/originals/db/00/ab/db00abcf6c5909bf4763f8c30fbe1701.jpg" alt=""> </div>
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
            <div class="card-action center">
                <a href="{{ route("art.edit", $artItem) }}"><i
                        class="material-icons green-text text-darken-1 tooltipped" data-tooltip="Edit">edit</i></a>
                <a href="{{ route("art.edit", $artItem) }}"><i
                        class="material-icons yellow-text text-darken-3 tooltipped"
                        data-tooltip="View">remove_red_eye</i></a>
                <form id="destroy-form" action="{{route('art.destroy', $artItem)}}" method="post">
                    @method("DELETE")
                    @csrf
                    <button style="background-color: transparent; border: none; cursor: pointer;" class="tooltipped"
                        data-tooltip="Delete">
                        <i class="material-icons red-text">delete</i>
                    </button>
                </form>


            </div>

        </div>

        @endforeach

    </container>
</div>



@endsection