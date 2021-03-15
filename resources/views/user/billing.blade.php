@extends('layouts.app')

@section('content')
    <div class="contaier">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="" class="btn btn-dark">
                            {{ __('Print bill') }}
                        </a>
                        <a href="/admin" class="btn btn-danger">
                            {{ __('Go back') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <strong><h3>{{ __('User Data')}}</h3></strong>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    {{ $user->id }}
                </div>
                <div class="col">
                    {{ $user->name }}
                </div>
                <div class="col">
                    {{ $user->email }}
                </div>
                <div class="col">
                    {{ $user->role }}
                </div>
            </div>

            
            <div class="row">
                <div class="col">
                    <strong><h3>{{ __('Billing data')}}</h3></strong>
                </div>
            </div>
        </div>
    </div>
@endsection