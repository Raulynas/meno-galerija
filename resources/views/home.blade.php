@extends('layouts.layout')

@section('content')
<div class="home-container container row">
        <div class="col s12">
            <div class="card center-align">
                <div class="card-content">
                    <div class="card-title">{{ __('Hello') }}</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                    {{ __('You are logged in!') }}

                </div>

            </div>
        </div>
</div>
@endsection
