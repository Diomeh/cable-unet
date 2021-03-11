@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1> {{ __("Oops!") }} </h1>
                    </div>
                    <div class="card-body">
                        <h2> {{ __("Seems what you're looking for doesn't exist") }} </h2>

                        <h4> 
                            {{ __('Maybe go to the ') }}
                            <a href="/home"> {{ __('homepage?') }} </a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection