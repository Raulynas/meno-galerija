@extends('layouts.layout')
@section('content')

<div class="section container">
    <div class="row">
        <div class="col s12 l5 offset-l3">
            <form method="post" action="">
                @csrf
                <div class="input-field">
                    <input type="text" name="name" id="name" value="{{$category->name}}" required>
                    <label for="name">Category name</label>
                </div>
                <div class="input-field center">
                    <input class="btn" type="submit" value="Save and Close">
                </div>

            </form>
        </div>


    </div>
</div>
@endsection