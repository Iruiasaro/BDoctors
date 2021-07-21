@extends('layouts.app')

@section('content')


<div class="container">


    {{-- <img src="{{$user->image}}" class="img-fluid rounded-circle" alt=""> --}}
    <img src="{{asset('imgs/avatar.png')}}" class="img-fluid rounded-circle" alt="">
    <li>NOME:{{$user->name}} </li>
    <li>COGNOME:{{$user->lastname}} </li>
    <li>EMAIL:{{$user->email}}</li>
    <li>INDIRIZZO:{{$user->address}} </li>
    <li>TELEFONO:{{$user->phone_number}} </li>
    <li>CURRICULUM VITAE:{{$user->curriculum}} </li>
    <li>PRESTAZIONE:{{$user->prestazione}} </li>
    @guest
        <button class="btn btn-primary">Invia un messaggio</button>
    @endguest
    
    @auth
    @if(Auth::user()->id==$user->id)
        <a class="btn btn-primary" href="{{ route('admin.edit', Auth::user()->id)}} "><i class="fa fa-address-card mr-2" aria-hidden="true"></i>Modifica Profilo</a>
    @endif
        
    @endauth
</div>

@endsection
