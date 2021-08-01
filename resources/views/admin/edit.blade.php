@extends('layouts.app')
@section('content')
<div class="d-flex mb-5">
    <div class="dashboard-container">
        @include('components.dashboard')
    </div>
    <div class=" my-scroll">
        <h3 class="mt-5 mb-3">
            Modifica i tuoi dati
        </h3>
        @if (count($errors->all()) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div>
            <form action="{{route('admin.update',$user->id)}}" enctype="multipart/form-data" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="image">
                        <div class="profile-img-container">
                            <img src="{{ str_contains(asset('storage/' . $user->image),"random") ? $user->image : asset('storage/' . $user->image) }}" class="img-fluid rounded img-preview" alt="">
                            <div>Modifica immagine:</div>
                            <input type="file" name="image" id="image" accept=".jpg, .svg, .png, .jpeg">
                        </div>
                    </label> <br>
                </div>
                <div class="form-group">
                    <label for="email"> email</label>
                    <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="name"> Nome</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="lastname"> Cognome </label>
                    <input class="form-control" type="text" id="lastname" name="lastname" value="{{$user->lastname}}">
                </div>
                <div class="form-group">
                    <label for="phone"> Telefono </label>
                    <input class="form-control" type="text" id="phone" name="phone_number" value="{{$user->phone_number}}">
                </div>
                <div class="form-group">
                    <label for=""> Indirizzo </label>
                    <input class="form-control" type="text" id="address" name="address" value="{{$user->address}}">
                </div>
                {{-- <div class="form-group">
                    <label for="file">
                        Curriculum vitae
                    </label> <br>
                    <input class="" type="file" name="cv" id="cv">
                </div> --}}
                <div class="form-group">
                    <label for="file">Carica il tuo CV: </label>
                    <div>
                        <input type="file" name="cv" id="cv" accept="application/pdf" />
                    </div>


                </div>
                <div class="form-group">
                    <label for="city">{{ __('Città')  }}:</label>
                    <div class="">
                        <select id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city_id" value="{{ old('city_id') }}" required autocomplete="city">
                            <option v-for="city in cities" :value="city.id">@{{city.name}}</option>
                        </select>
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="mt-2 mb-2">Seleziona una o più specializzazioni:</div>
                    <div v-for="specialization in specializations" :key="specialization.id" class="form-check form-check-inline">
                        <input class="form-check-input" name="specializations[]" type="checkbox" :id="specialization.id" :value="specialization.id">
                        <label class="form-check-label" :for="specialization.id">@{{ specialization.specs_type }} </label>
                    </div>
                    {{-- <label for="selectSpec"></label>
                    <select v-model="selectedSpec" class="my-select" name="specialization" id="selectSpec" v-on:change="specializationChange(selectedSpec)">
                        <option disabled>Scegli una specializzazione</option>
                        <option v-for="specialization in specializations" :key="specialization.id" :value="specialization.id">
                            @{{ specialization.specs_type }}
                    </option>
                    </select> --}}
                </div>
                <div class="form-group">
                    <label for=""> Prestazione </label>
                    <input class="form-control" type="text" id="prestazione" name="prestazione" value="{{$user->prestazione}}">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary"> Modifica</button>
                </div>
            </form>
            <form action="{{ route('admin.destroy', $user->id) }}" class="d-inline-block mt-2 mb-5" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" id="delete" value="Elimina profilo">
            </form>
        </div>
    </div>
</div>
@endsection
