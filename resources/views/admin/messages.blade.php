@extends('layouts.app')
@section('content')
<div class="d-flex mb-5">
    <div class="dashboard-container">
        @include('components.dashboard')
    </div>
    <div class="container" >
        <h3 class="mt-5 mb-3">
            I tuoi messaggi
        </h3>
        <div class="scroll-layout">
            @foreach($messages as $message)
            <div class="" role="alert" style="opacity:100%; width:100%" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                   <i class="fa fa-user" aria-hidden="true"></i>
                    <strong class="ml-3 mr-auto"> Da: <span>{{$message->sender_name}}</span></strong>
                    <small>{{$message->created_at}}</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <p>{{$message->content}}</p>
                </div>
            </div>


            @endforeach
        </div>

    </div>
</div>

@endsection
