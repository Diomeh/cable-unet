@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container-fluid">            
            <div class="card">
                <div class="card-header">
                    <strong><h1> {{ __('ADMIN PANEL') }} </h1></strong>
                </div>
                <div class="card-body">
                    <div class="container">
                        {{-- User management --}}
                        <div class="row ">
                            <div class="container-fluid bg-body p-4">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-body w-100">
                                            <strong><h3> {{ __('User management') }} </h3></strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <a href="/admin/users" class="btn btn-outline-secondary w-100 shadow">
                                            <div class="card-body">
                                                {{ __('User list') }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md">
                                        <a href="/admin/billing" class="btn btn-outline-secondary w-100 shadow">
                                            <div class="card-body">
                                                {{ __('Billing information') }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md">
                                        <a href="/admin/users/requested" class="btn btn-outline-secondary w-100 shadow">
                                            <div class="card-body">
                                                {{ __('User requested package change') }}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        {{-- Products management --}}
                        <div class="row">
                            <div class="container-fluid bg-body p-4">
                                <div class="row">
                                    <div class="card-body w-100">
                                        <strong><h3> {{ __('Products management') }} </h3></strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <a class="btn btn-outline-secondary w-100 shadow" href="/admin/packages/create">
                                            <div class="card-body">
                                                {{ __('Create package') }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md">
                                        <a class="btn btn-outline-secondary w-100 shadow" href="/admin/create/service">
                                            <div class="card-body">
                                                {{ __('Create service') }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md">
                                        <a class="btn btn-outline-secondary w-100 shadow" href="/admin/load/channels">
                                            <div class="card-body">
                                                {{ __('Load channels') }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md">
                                        <a class="btn btn-outline-secondary w-100 shadow" href="/admin/load/programs">
                                            <div class="card-body">
                                                {{ __('Load channel programs') }}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- List products --}}
                        <div class="row">
                            <div class="container-fluid bg-body p-4">
                                <div class="row">
                                    <div class="card-body w-100">
                                        <strong><h3> {{ __('List products') }} </h3></strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <a class="btn btn-outline-secondary w-100 shadow" href="/admin/packages">
                                            <div class="card-body">
                                                {{ __('List packages') }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md">
                                        <a class="btn btn-outline-secondary w-100 shadow" href="/admin/services">
                                            <div class="card-body">
                                                {{ __('List services') }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md">
                                        <a class="btn btn-outline-secondary w-100 shadow" href="/admin/channels">
                                            <div class="card-body">
                                                {{ __('List channels') }}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection