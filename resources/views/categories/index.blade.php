@extends('layouts.layout')

@section('content')
<div class="conatainer">

    <div class="row">
        <div class="col s12 l8 offset-l1 center">
            <span class="indigo-text" style="font-style: italic">{{session("msg")}}</span>
        </div>

        <div class="col s12 l6 offset-l2">

            <table class="highlight centered">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category["name"] }}</td>
                        <td><a href="{{ route("categories.edit", $category) }}"><i
                                    class="material-icons green-text text-darken-1">edit</i></a></td>
                        <td>
                            <form id="destroy-form" action="{{route('categories.destroy', $category)}}" method="post">
                                @method("DELETE")
                                @csrf
                                <button style="background-color: transparent; border: none; cursor: pointer;"
                                    class="tooltipped" data-position="right" data-tooltip="Delete Category">
                                    <i class="material-icons red-text">delete</i>
                                </button>
                            </form>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>


@endsection