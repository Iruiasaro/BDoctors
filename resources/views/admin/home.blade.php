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
                    <div class="card-header">Pannello di Controllo </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                         Benvenuto, {{ Auth::user()->name }} 
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">Ultimo Messaggio </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection
