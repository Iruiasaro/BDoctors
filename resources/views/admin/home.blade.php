@extends('layouts.app')

@section('content')

<div class="d-flex mt-5 mb-5">
    <div class="dashboard-container">
        @include('components.dashboard')
    </div>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
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
    </div>
</div>

@endsection
