@extends('layouts.app')

@section('content')
<meta name="user-id" content="{{ $user->id }}">
<div class="d-flex mb-5">
    <div class="dashboard-container">
        @include('components.dashboard')
    </div>
    <div class="container">
        <div class="p-4 mt-5">
            <h1>Recensioni:</h1>
            <div v-for="review in reviews" class="mt-3 mb-3 shadow">
                <div class="p-4">
                    <i>@{{review.reviewer}} </i>
                    <h5>@{{review.title}}</h5>
                    <p>@{{review.content}}</p>
                    <sub> @{{review.sender_name}}</sub>
                    <div> <i v-for="items in review.vote" class="fa fa-star color-primary" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
