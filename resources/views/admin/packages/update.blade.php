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
                    <div class="card-header">{{ __(isset($package) ? 'Edit package data' : 'Create a new package') }}
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ __(isset($package) ? '/admin/packages/update/' . $package->id : '/admin/package/create') }}">
                            @csrf

                            @isset($package)
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>

                                <div class="col-md-6">
                                    <input type="text" disabled class="form-control" value="{{ $package->id }}">
                                </div>
                            </div>
                            @endisset

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ __(isset($package) ? $package->name : '') }}" autocomplete="name"
                                        autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cable service') }}</label>

                                <div class="col-md-6">
                                    <select name="" id="" class="custom-select">

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Internet service') }}</label>

                                <div class="col-md-6">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="form-check form-check-inline">
                                                <label for="iservice_radio_old"
                                                    class="form-check-label">{{ __('Use existing service') }}</label>
                                                <input type="radio" name="iservice_radio" id="iservice_radio_old"
                                                    class="form-check-input"
                                                    onclick="handleServiceClick(1, 'iselect', 'ifields');">
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label for="iservice_radio_new"
                                                    class="form-check-label">{{ __('Create service') }}</label>
                                                <input type="radio" name="iservice_radio" id="iservice_radio_new"
                                                    class="form-check-input"
                                                    onclick="handleServiceClick(2, 'iselect', 'ifields');">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <select name="" id="iselect" class="custom-select" disabled>

                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="number" name="" id="" class="ifields">
                                            </div>
                                            <div class="col">
                                                <input type="text" name="" id="" class="ifields">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Phone service') }}</label>

                                <div class="col-md-6">
                                    <select name="" id="" class="custom-select">
                                        {{-- @foreach ($i_plans as $i_plan)
                                            <option value="{{ $i_plan->id }}">{{ $i_plan->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for=""
                                    class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <textarea name="" id="" class="form-control"></textarea>
                                </div>
                            </div>

                            <div>
                                <input type="hidden" name="author"
                                    value="{{ Illuminate\Support\Facades\Auth::user()->id }}">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-outline-dark">
                                            {{ __( (isset($user) ? 'Update' : 'Create') . ' package') }}
                                        </button>
                                        <a href="{{ __('/admin/packages') }}" class="btn btn-outline-danger">
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

<script type="text/javascript">
    function handleServiceClick(n, id_a, id_b) {
        // use existent service
        if(n == 1){
            document.getElementById(id_a).disabled = false;
            let b = document.getElementsByClassName(id_b);
            for (let i = 0; i < b.length; i++)
                b[i].disabled = true;
            return;
        }

        // create new service
        document.getElementById(id_a).disabled = true;
        let b = document.getElementsByClassName(id_b);
        for (let i = 0; i < b.length; i++)
            b[i].disabled = false;
    }
</script>