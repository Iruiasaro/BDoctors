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

            <select v-model="selectedCity" class="my-select" name="citta" id="">
                <option value="all">Tutta Italia</option>
                <option v-for="city in cities" :value="city.id">@{{city.name}}</option>
            </select>
            <button class="btn btn-primary" type="submit"> Cerca</button>
        </form>
    </div>
</main>

<section v-if="!isLoading && isSearched==true" class="my-wrap p-5">
    <div class="d-flex justify-content-between responsive-flex">
        <div class="m-2">
            <h2 class="mb-4 flex-shrink-0"> Risultati Ricerca </h2>
        </div>
        <div class="m-2">
            <form action="">
                <div class="mb-3">Filtra per media recensioni: </div>
                <div v-for="index in 5" class="form-check form-check-inline" v-on:change="onChangeStar()">
                    <div v-if="index==1" class="mr-4">
                        <input class="form-check-input" type="radio" v-model="selectedStar" id="all" value="all">
                        <label class="form-check-label" for="all"> Tutti i Dottori </label>
                    </div>
                    <input class="form-check-input" type="radio" v-model="selectedStar" :id="index" :value="index">
                    <label class="form-check-label" :for="index"><span v-for="item in index"><i class="fa fa-star color-primary" aria-hidden="true"></i> </span> </label>
                </div>
            </form>
        </div>
        <div class="m-2">
            <button class="btn" v-on:click="sortByReviewsNumber()"> <i class="fa m-2" :class="!sortValue ? 'fa-sort-amount-asc':'fa-sort-amount-desc'" aria-hidden="true"></i>Filtra per numero di recensioni</button>
        </div>
    </div>

    <div class="">
        <div v-if="!isLoading" class="suggested-doctors d-flex flex-wrap">
            <div v-for="doctor in filterResult" class="card" style="">
                <div class="card-img-top overflow-hidden" style="min-height:200px">
                    <img v-if="!doctor.image" src="{{asset('imgs/avatar.png')}}" alt="" style="width:100%">
                    <img v-else :src="doctor.image.includes('random')?doctor.image:'storage/' + doctor.image" alt="Card image cap" style="width:100%">
                </div>
                <div class=" card-body">
                    <h5 class="card-title">@{{doctor.name}}</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        <div>
                            <ul style="list-style-position: inside">
                                <li v-for="specialization in doctor.specializationsArray"><i> @{{specialization.specs_type}} </i></li>
                            </ul>
                        </div>
                        <h6> <i class="fa fa-map-marker" aria-hidden="true"></i> @{{doctor.cityName}} </h6>
                        <h6> <i class="fa fa-star-half-o" aria-hidden="true"></i> Recensioni: (@{{doctor.reviews.length}}) </h6>
                    </p>
                    <div> <i v-for="index in Math.round(doctor.voteAverage)" class="fa fa-star third-color"> </i></div>
                    <a :href='show(doctor.id)' class="btn btn-primary" style="width: 100%">Visualizza Profilo</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section v-else-if="isLoading" class="p-5 d-flex justify-content-center align-items-center">
    <div>
        <img class="loading" src="{{asset('/imgs/loading.gif')}}" alt="">
    </div>
</section>


<section class="my-wrap p-5">
    <div class="d-flex  justify-content-between ">
        <div>
            <h2 class="mb-4"> Dottori consigliati </h2>
        </div>
    </div>
    <p> Prenota una visita da un dottore consigliato da <span class="color-primary">BDoctors</span> .</p>
    <div class="suggested-doctors d-flex flex-wrap ">
    </div>
</section>

@endsection
