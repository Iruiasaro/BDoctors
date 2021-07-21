@extends('layouts.app')

@section('content')

<li>NOME:{{$user->name}} </li>
<li>COGNOME:{{$user->lastname}} </li>
<li>EMAIL:{{$user->email}} </li>
<li>INDIRIZZO:{{$user->address}} </li>
<li>TELEFONO:{{$user->phone_number}} </li>
<li>CURRICULUM VITAE:{{$user->curriculum}} </li>
<li>PRESTAZIONE:{{$user->prestazione}} </li>

@endsection
