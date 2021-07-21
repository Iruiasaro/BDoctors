@extends('layouts.app')
@section('content')
<div class="d-flex mt-5 mb-5">
    <div class="dashboard-container">
        @include('components.dashboard')
    </div>
    <div class="container">
        <h3 class="mt-5 mb-3">
            Modifica i tuoi dati
        </h3>
        <div>
            <form action="{{route('admin.update',$user->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="file">
                        <div class="profile-img-container">
                            <img src="{{$user->image}}" class="img-fluid rounded-circle" alt="">
                            <div>Modifica immagine:</div>
                        </div>
                    </label> <br>
                    <input class="" type="file" name="image" id="image">
                </div>
                <div class="form-group">
                    <label for="email"> email</label>
                    <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="name"> Nome</label>
                    <input class="form-control" type="text" id="name" name="name" value="">
                </div>
                <div class="form-group">
                    <label for="lastname"> Cognome </label>
                    <input class="form-control" type="text" id="lastname" name="lastname" value="">
                </div>
                 <div class="form-group">
                    <label for="password"> Password </label>
                    <input class="form-control" type="password" id="lastname" name="lastname" value="">
                </div>
                <div class="form-group">
                    <label for="phone"> Telefono </label>
                    <input class="form-control" type="text" id="phone" name="telefono" value="">
                </div>
                <div class="form-group">
                    <label for=""> Indirizzo </label>
                    <input class="form-control" type="text" id="address" name="address" value="">
                </div>
                <div class="form-group">
                    <label for="file">
                        Curriculum vitae
                    </label> <br>
                    <input class="" type="file" name="cv" id="cv">
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <H3 class="alert-danger"> VUE SPECIALIZATION </H3>
                </div>
                <div><button class="btn btn-primary"> Modifica </button></div>
            </form>
            <div class="form-group">
                <label for=""> Prestazione </label>
                <input class="form-control" type="text" id="address" name="address" value="">
            </div>

        </div>

    </div>
</div>

@endsection
