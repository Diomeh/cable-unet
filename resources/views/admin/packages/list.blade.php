@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card-body w-100 text-center">
                        <strong>
                            <h1>{{ __('Package list') }}</h1>
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
                        <a href="/admin/packages/create" class="btn btn-dark btn-large">
                            {{ __('Create new package') }}
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
                                <th style="width: 15%">{{ __('Name') }}</th>
                                <th style="width: 15%">{{ __('Cable service') }}</th>
                                <th style="width: 15%">{{ __('Internet service') }}</th>
                                <th style="width: 15%">{{ __('Phone service') }}</th>
                                <th style="width: 25%">{{ __('Description') }}</th>
                                <th style="width: 15%">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->id_service_cable }}</td>
                                <td>{{ $p->id_service_internet }}</td>
                                <td>{{ $p->id_service_landline }}</td>
                                <td>{{ $p->id_created_by }}</td>
                                <td>{{ $p->description }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-outline-dark" href="{{ '/admin/packages/update/' . $p->id }}">
                                            {{ __('Edit') }}
                                        </a>
                                        <a class="btn btn-outline-danger" href="{{ '/admin/packages/delete/' . $p->id }}">
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