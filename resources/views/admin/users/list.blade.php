@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid">

        @if(Session::get('action_status'))
        <div class="container-fluid my-5">
            <div class="alert alert-{{ Session::get('action_status') }} alert-dismissible fade show shadow">
                <strong>{{ Session::get('action_msg') }}</strong>
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-9">
                <div class="card-body w-100 text-center">
                    <strong>
                        <h1>{{ __('User list') }}</h1>
                    </strong>
                </div>
            </div>
            <div class="col-md-3">
                <style>
                    .vertical-center {
                        position: relative;
                        top: 50%;
                        transform: translateY(-50%);
                    }
                </style>
                <div class="btn-group vertical-center">
                    <a href="/admin/users/create" class="btn btn-dark btn-large">
                        {{ __('Create new user') }}
                    </a>
                    <a href="/admin" class="btn btn-danger">
                        {{ __('Go back') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col shadow bg-body p-0 rounded">
                <table class="table table-striped text-center m-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 5%">{{ __('#') }}</th>
                            <th style="width: 30%">{{ __('Name') }}</th>
                            <th style="width: 30%">{{ __('Email') }}</th>
                            <th style="width: 10%">{{ __('Role') }}</th>
                            <th style="width: 25%">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role == '10' ? 'Admin' : 'User' }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-outline-dark" href="{{ '/admin/users/update/' . $user->id }}">
                                        {{ __('Edit') }}
                                    </a>
                                    <a href="{{ '/user/' . $user->id . '/billing' }}" class="btn btn-outline-primary">
                                        {{ __('Print bill') }}
                                    </a>
                                    <a class="btn btn-outline-danger" href="{{ '/admin/users/delete/' . $user->id }}">
                                        {{ __('Delete') }}
                                    </a>
                                </div>
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