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
                    <input class="form-control" type="text" id="name" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="lastname"> Cognome </label>
                    <input class="form-control" type="text" id="lastname" name="lastname" value="{{$user->lastname}}">
                </div>
                <div class="form-group">
                    <label for="phone"> Telefono </label>
                    <input class="form-control" type="text" id="phone" name="phone_number"
                        value="{{$user->phone_number}}">
                </div>
                <div class="form-group">
                    <label for=""> Indirizzo </label>
                    <input class="form-control" type="text" id="address" name="address" value="{{$user->address}}">
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

                <div class="form-group">
                    <label for=""> Prestazione </label>
                    <input class="form-control" type="text" id="prestazione" name="prestazione"
                        value="{{$user->prestazione}}">
                </div>

                <div>
                    <button type="submit" class="btn btn-primary"> Modifica</button>
                </div>
            </form>
            <form action="{{ route('admin.destroy', $user->id) }}" class="d-inline-block" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Elimina profilo">
            </form>
        </div>
    </div>
</div>

@endsection