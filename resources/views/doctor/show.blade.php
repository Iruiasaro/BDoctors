@extends('layouts.app')

@section('content')
<meta name="user-id" content="{{ $user->id }}">

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
                                    <h5 class="modal-title" id="exampleModalToggleLabel">Contatta il dr. {{$user->name}} </h5>
                                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times fa-2x" aria-hidden="true"></i></button>
                                </div>
                                <div class="modal-body">
                                    <label class="w-100" for="">Nome e Cognome <input type="text" name="sender_name" class="w-100"></label>
                                </div>
                                <div class="modal-body">
                                    <label for=""> Contenuto del messaggio da inviare al dottore:</label>
                                    <textarea name="content" id="" class="w-100" cols="30" rows="10"></textarea>
                                    <br>
                                    <button class="btn btn-primary w-100 mt-4">Invia</button>
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
    <section>
        <ul class="bg-light-gray p-4 mt-2 rounded list-unstyled">
            <li class="dottor-specs"> <i class="fa fa-envelope" aria-hidden="true"></i> {{$user->email}}</li>
            <li class="dottor-specs"> <i class="fa fa-map-marker" aria-hidden="true"></i></i>{{$user->address}}</li>
            <li class="dottor-specs"> <i class="fa fa-phone" aria-hidden="true"></i> {{$user->phone_number}}</li>
            <li class="dottor-specs"> <i class="fa fa-file-text" aria-hidden="true"></i>{{$user->curriculum}}</li>
            <li class="dottor-specs"> <i class="fa fa-medkit" aria-hidden="true"></i>{{$user->prestazione}}</li>
        </ul>
    </section>
    <section>
        <h2>Recensioni:</h2>
        <div v-for="review in reviews" class="mt-3 mb-3">
            <div>
                <i>@{{review.reviewer}} </i>
                <h5>@{{review.title}}</h5>
                <p>@{{review.content}}</p>
                <sub> @{{review.sender_name}}</sub>
                <div> <i v-for="items in review.vote" class="fa fa-star color-primary" aria-hidden="true"></i></div>
            </div>
        </div>
    </section>

    @endsection
