@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid">
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
                    <div class="card-header">
                        {{ __(isset($service) ? 'Edit service data' : 'Create a new internet service') }}
                    </div>
                    <div class="card-body">

                        <form method="POST"
                            action="{{ __(isset($service) ? '/admin/services/update/cable/' . $service->id : '/admin/services/create/cable') }}">
                            @csrf

                            @isset($service)
                            <div class="form-group row">
                                <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>

                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" disabled class="form-control"
                                        value="{{ $service->id }}">
                                </div>
                            </div>
                            @endisset

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ __(isset($service) ? $service->name : '') }}" autocomplete="name"
                                        autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <input type="hidden" name="author"
                                    value="{{ Illuminate\Support\Facades\Auth::user()->id }}">
                            </div>

                            <div class="form-group row">
                                <label for="channel_count"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Channel count') }}</label>

                                <div class="col-md-6">
                                    <input id="channel_count" type="number"
                                        class="form-control @error('channel_count') is-invalid @enderror"
                                        name="channel_count"
                                        value="{{ __(isset($service) ? $service->channel_count : '') }}"
                                        autocomplete="channel_count">

                                    @error('channel_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ __(isset($service) ? $service->price : '') }}" autocomplete="price">

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                    for="description">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" id="description" name="description">
                                        {{ __(isset($service) ? $service->description : '') }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-outline-dark">
                                            {{ __( (isset($service) ? 'Update' : 'Create') . ' service') }}
                                        </button>
                                        <a href="{{ __('/admin/services') }}" class="btn btn-outline-danger">
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
</div>
@endsection