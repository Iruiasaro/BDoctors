@extends('layouts.app')
@section('content')
<main class="d-flex p-4" :class="isSearched ? 'no-height' : ''">
    <div class="container">
        <form action="" @submit.prevent="onSubmit">
            <h1 class="text-white mb-5">Cerca un dottore nella tua zona.</h1>
            <select v-model="selectedSpec" class="my-select" name="specialization" id="">
                <option disabled>Scegli una specializzazione</option>
                <option v-for="specialization in specializations" :key="specialization.id" :value="specialization.id">
                    @{{ specialization.specs_type }}
                </option>
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
            <button class="btn btn-primary" type="submit">Cerca</button>
        </form>
    </div>
</main>

<section class="my-wrap p-5">
    <h2 class="mb-4"> Dottori consigliati </h2>
    <p> Prenota una visita da un dottore consigliato da <span class="color-primary">BDoctors</span> .</p>
    <div class="suggested-doctors d-flex flex-wrap ">
        <div v-for="doctor in searchResult" class="card" style="">
            <img class="card-img-top" :src="doctor.image" alt="Card image cap"/>
            <div class="card-body">
                <h5 class="card-title">@{{doctor.name}}</h5>
                <p class="card-text">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium
                    deserunt nobis iure quasi debitis magnam.
                </p>
                <a :href='show(doctor.id)' class="btn btn-primary" style="width: 100%">Visualizza Profilo</a>
            </div>
        </div>
    </div>
</section>
@endsection
