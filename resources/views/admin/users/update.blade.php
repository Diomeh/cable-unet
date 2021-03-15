@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::get('fail'))
        <div class="container-fluid my-5">
            <div class="alert alert-danger alert-dismissible fade show shadow">
                <strong>{{ Session::get('fail') }}</strong>
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(isset($user) ? 'Edit user data' : 'Create new user') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ __(isset($user) ? '/admin/users/update/' . $user->id : '/admin/users/create') }}">
                        @csrf

                        @isset($user)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>
                            
                            <div class="col-md-6">
                                <input type="text" disabled class="form-control" value="{{ $user->id }}">
                            </div>
                        </div>
                        @endisset

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name" 
                                    value="{{ __(isset($user) ? $user->name : '') }}" 
                                    {{-- required  --}}
                                    autocomplete="name" 
                                    autofocus
                                >

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" 
                                    value="{{ __(isset($user) ? $user->email : '') }}" 
                                    {{-- required  --}}
                                    autocomplete="email"
                                >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('User role') }}</label>

                            <div class="col-md-6">
                                <select name="role" id="role" class="custom-select">

                                    @if(isset($user) && $user->role == '10')
                                        <option value="1">{{ __('User') }}</option>
                                        <option value="10" selected>{{ __('Admin') }}</option>
                                    @else
                                        <option value="1" selected>{{ __('User') }}</option>
                                        <option value="10">{{ __('Admin') }}</option>
                                    @endif
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" 
                                    type="text"
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password"
                                >

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @isset($user)   
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" style="font-size: .75rem;">
                                <p class="text-muted">
                                    {{ __('Leave this field empty if you do not wish to change the password') }}
                                </p>
                            </div>
                        </div>
                        @endisset

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-outline-dark">
                                        {{ __( (isset($user) ? 'Update' : 'Create') . ' user') }}
                                    </button>
                                    <a href="{{ __('/admin/users') }}" class="btn btn-outline-danger">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection