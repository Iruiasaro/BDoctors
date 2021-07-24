@extends('layouts.app')
@section('content')
<main class="d-flex p-4">
    <div class="container">
        <search-input></search-input>
    </div>
</main>

<section class="my-wrap p-5">
    <h2 class="mb-4"> Dottori consigliati </h2>
    <p> Prenota una visita da un dottore consigliato da <span class="color-primary">BDoctors</span> .</p>
    <div class="suggested-doctors d-flex flex-wrap ">
        @foreach($doctors as $doctor)
        <home-doctor-card 
            img="{{$doctor->image}}"
            name="{{$doctor->name }}" 
            link="{{route('doctor.show',$doctor->id)}}">
        </home-doctor-card>
        @endforeach
        {{-- @foreach($doctors as $doctor)
        <div class="card" style="">
            <img class="card-img-top" src="{{$doctor->image ? $doctor->image : asset('imgs/avatar.png')}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$doctor->name}}</h5>
            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium deserunt nobis iure quasi debitis magnam.</p>
            <a href="{{route('doctor.show',$doctor->id)}} " class="btn btn-primary" style="width:100%">Visualizza Profilo</a>
        </div>
    </div>
    @endforeach --}}
    </div>
</section>
@endsection
