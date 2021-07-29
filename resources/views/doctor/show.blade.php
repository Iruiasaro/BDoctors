@extends('layouts.app')

@section('content')


<div class="container mb-5">
    <div class="bg-light-gray p-2 rounded mt-5 d-flex">
        <div class="profile-img overflow-hidden h-100"> <img src="{{ str_contains(asset('storage/' . $user->image),"random") ? $user->image : asset('storage/' . $user->image) }}" class="img-fluid rounded" alt=""></div>
        <div class="ml-4 p-2">
            <h3>{{$user->name}}</h3>
            <div><i>specializzazione</i></div>
            <div>
                @for ($i = 0; $i < 4; $i++) <span class="color-primary"> <i class="fa fa-star" aria-hidden="true"></i> </span>
                    @endfor
            </div>
            <div class="mt-3">
                @guest
                {{-- <button class=" btn btn-primary">Invia un messaggio </button> --}}
                <form method="post" action="{{route('doctor.message',$user->id)}} ">
                    @csrf @method('PATCH')
                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleLabel">Scrivi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <input type="text" name="sender_name">
                                <div class="modal-body">

                                    <textarea name="content" id="" cols="30" rows="10"></textarea>
                                    <button class="btn btn-primary">Invia</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" type="submit" id="send-message">Invia un messaggio al dottore</a>
                    <script type="application/javascript">
                        let button = document.getElementById('send-message');
                        button.addEventListener('click', () => {
                            ev.preventDefault()
                            alert("Messaggio inviato");
                        });

                    </script>
                </form>


                @endguest

                @auth
                @if(Auth::user()->id==$user->id)
                <a class="btn btn-primary" href="{{ route('admin.edit', Auth::user()->id)}} "><i class="fa fa-address-card mr-2" aria-hidden="true"></i>Modifica Profilo</a>
                @endif

                @endauth

            </div>
        </div>
    </div>
    <ul class="bg-light-gray p-4 mt-2 rounded list-unstyled">
        <li class="dottor-specs"> <i class="fa fa-envelope" aria-hidden="true"></i> {{$user->email}}</li>
        <li class="dottor-specs"> <i class="fa fa-map-marker" aria-hidden="true"></i></i>{{$user->address}}</li>
        <li class="dottor-specs"> <i class="fa fa-phone" aria-hidden="true"></i> {{$user->phone_number}}</li>
        <li class="dottor-specs"> <i class="fa fa-file-text" aria-hidden="true"></i>{{$user->curriculum}}</li>
        <li class="dottor-specs"> <i class="fa fa-medkit" aria-hidden="true"></i>{{$user->prestazione}}</li>
    </ul>
    <div class="">
        <h3>team 6</h3>
    </div>
    @endsection
