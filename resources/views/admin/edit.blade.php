@extends('layouts.app')
@section('content')
    <form action="" method="post">
    @csrf
        <input type="text" name="name" value=""> 
        <input type="text" name="specializzazione" value="">
        <input type="text" name="telefono" value=""> 
        <input type="text" name="indirizzo" value=""> 
        <select name="" id="">
            <option value=""></option>
        </select>
        <button class="btn btn-primary"> Crea</button>
    </form>
@endsection