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
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="file">
                        <div class="profile-img-container">
                            <img src="" alt="">
                            <div>Modifica immagine:</div>
                        </div>
                    </label> <br>
                    <input class="" type="file" name="file" id="file">
                </div>
                <div class="form-group">
                    <label for=""> </label>
                    <input class="form-control" type="text" id="name" name="name" value="">
                </div>
                <div class="form-group">
                    <label for=""> </label>
                    <input class="form-control" type="text" id="" name="telefono" value="">
                </div>
                <div class="form-group">
                    <label for=""> </label>
                    <input class="form-control" type="text" id="" name="indirizzo" value="">
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <select class="form-control" id="" name="" id="">
                        <option value=""></option>
                    </select>
                </div>
                <div><button class="btn btn-primary"> Modifica </button></div>
            </form>
        </div>

    </div>
</div>

@endsection
