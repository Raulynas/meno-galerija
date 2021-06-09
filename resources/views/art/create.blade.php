@extends('layouts.layout')
@section('content')

<div class="section container">
    <div class="row">
        <div class="col s12 l5 offset-l3">
            <form method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="input-field">
                    <input type="text" name="title" id="title" required>
                    <label for="title">Title</label>
                </div>
                <div class="input-field">
                    <textarea id="textarea" name="description" class="materialize-textarea"></textarea>
                    <label for="textarea">Description</label> </div>

                <div class="input-field">
                    <select multiple id="category_id" name="category_id[]" value="0" required>

                        <option value="0" disabled selected>Select categories</option>
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field">
                                    <input type="file" name="image" id="image">
                                </div>

                <div class="input-field center">
                    <input class="btn" type="submit" value="Save">
                </div>

            </form>
        </div>


    </div>
</div>
@endsection