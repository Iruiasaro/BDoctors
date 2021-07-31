@extends('layouts.app')
@section('content')
    <div class="d-flex mb-5">
        <div class="dashboard-container">
            @include('components.dashboard')
        </div>
        <div class="container ">
            <div class="flex-grow-1 p-3">
                    @csrf @method( 'PUT' )
                    <h2> Scegli la sponsorizzazione</h2>
                    <p>Applica un piano per sponsorizzare il tuo profilo e apparire prima nelle ricerche</p>
                    <div class="container-sponsorization d-flex justify-content-around">
                        @foreach($sponsorizations as $sponsorization)
                            <form class="mt-5" action="" method="post" id="formId">
                                 <div class="card card-sponsorization d-flex align-items-center justify-content-around">
                                    <h1 style="color: {{ $sponsorization->color }}" class="type-plan"><span class="plan">Piano</span> {{ $sponsorization->name_plan }}</h1>
                                    <hr>
                                    <h1 class="price"> {{ intval($sponsorization->price) }}<span class="decimal-nn">.99</span><span class="eur"> €</span></h1>
                                    <button class="btn btn-primary" onclick="location.href='{{ route('payment', $sponsorization->id ) }}'" type="button">Acquista</button>
                                 </div>
                            </form>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
@endsection
