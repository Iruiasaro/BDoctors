@extends('layouts.app')
@section('content')
<main class="d-flex p-4">
    <div class="container">
        <form action="" method="post">
            {{-- <label for="">
                Cerca un dottore
                <input type="text">
            </label> --}}
            <h1 class="text-white mb-5">
                Cerca un dottore nella tua zona.
               
            </h1>

            <div v-for="i in 10" :key="i">
            <span v-text="'TestoVue ' +i"></span>
            </div>
            <select class="my-select" name="specializzazione" id="">
                <option disabled>Scegli una specializzazione</option>
                @foreach($specializations as $specialization)
                     <option value="{{$specialization->specs_type}}">{{$specialization->specs_type}}</option>
                @endforeach
               
            </select>
            <select class="my-select" name="citta" id="">
                <option disabled>Scegli una città</option>
                <option value="roma">Roma</option>
                <option value="milano">Milano</option>
                <option value="milano">Carlopoli</option>
                <option value="milano">Siracusa</option>
                <option value="milano">Senigallia</option>
                <option value="milano">Vicenza</option>
            </select>
            <input type="submit" class="btn btn-primary" value="Cerca">
        </form>
    </div>
</main>
<section class="my-wrap p-5">
    <h2 class="mb-4"> Dottori consigliati </h2>
    <p> Prenota una visita da un dottore consigliato da <span class="color-primary">BDoctors</span> .</p>
    <div class="suggested-doctors d-flex flex-wrap ">

        @foreach($doctors as $doctor)
        <div class="card" style="">
            <img class="card-img-top" src="{{$doctor->image ? $doctor->image : asset('imgs/avatar.png')}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$doctor->name}}</h5>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium deserunt nobis iure quasi debitis magnam.</p>
                <a href="{{route('doctor.show',$doctor->id)}} " class="btn btn-primary" style="width:100%">Visualizza Profilo</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
