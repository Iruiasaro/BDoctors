@extends('layouts.app')

@section('content')


<div class="container mb-5">
    <div class="bg-light-gray p-2 rounded mt-5 d-flex">
    @dump($user->image)
        <div> <img src="{{$user->image}}" class="img-fluid rounded" alt=""></div>
        <div class="ml-4 p-2">
            <h3>{{$user->name}}</h3>
            <div><i>specializzazione</i></div>
            <div>
                @for ($i = 0; $i < 4; $i++) <span class="color-primary"> <i class="fa fa-star" aria-hidden="true"></i> </span>
                    @endfor
            </div>
            <div class="mt-3">
                @guest
                <button class="btn btn-primary">Invia un messaggio</button>
                @endguest

                @auth
                @if(Auth::user()->id==$user->id)
                <a class="btn btn-primary" href="{{ route('admin.edit', Auth::user()->id)}} "><i class="fa fa-address-card mr-2" aria-hidden="true"></i>Modifica Profilo</a>
                @endif

                @endauth

            </div>
        </div>
    </div>
    <ul class="bg-light-gray p-4 mt-2 rounded list-unstyled">
        <li class="dottor-specs"> <i class="fa fa-envelope" aria-hidden="true"></i> {{$user->email}}</li>
        <li class="dottor-specs"> <i class="fa fa-map-marker" aria-hidden="true"></i></i>{{$user->address}}</li>
        <li class="dottor-specs"> <i class="fa fa-phone" aria-hidden="true"></i> {{$user->phone_number}}</li>
        <li class="dottor-specs"> <i class="fa fa-file-text" aria-hidden="true"></i>{{$user->curriculum}}</li>
        <li class="dottor-specs"> <i class="fa fa-medkit" aria-hidden="true"></i>{{$user->prestazione}}</li>
    </ul>

    @endsection
