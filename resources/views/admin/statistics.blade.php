  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="user-id" content="{{ Auth::user()->id }}">
      <title>Statistiche </title>
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!-- Styles -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap.native/4.0.3/bootstrap-native.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      {{-- Scripts --}}
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
      <script src="{{asset("js/script.js")}}"></script>
      <script src="{{ asset('js/app.js') }}" defer></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- SCRIPTS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
      <script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>
      <script type="" src="{{asset('js/charts.js')}}"></script>
      <meta name="user-id" content="{{ Auth::user()->id }}">
  </head>
  <body>
  </body>
  </html>

  <nav class="navbar navbar-expand-md navbar-light bg-color-primary">
      <div class="container">
          <a class="animate__bounce navbar-brand my-navbar-brand" href="{{ url('/') }}">
              <img src="{{asset('imgs/logo-white2.png')}}" class="logo img-fluid p-3" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <i class="fa fa-bars text-white" aria-hidden="true"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              @guest
              <div class="navbar-nav flex-grow-1 justify-content-end text-white">
                  <span class="mr-3">Sei un dottore? <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </span>
              </div>
              @endguest
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                  <li class="nav-item">
                      <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                  </li>
                  @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link text-white" href="{{ route('register') }}"> Registrati </a>
                  </li>
                  @endif
                  @else
                  <li class="nav-item dropdown text-white">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('admin.home') }}">
                              <i class="fa fa-user-md" aria-hidden="true"></i> Amministratore
                          </a>
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                              <i class="fa fa-sign-out" aria-hidden="true"></i>
                              {{ __('Logout') }}

                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </div>
                  </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav>
  <div class="d-flex flex-wrap" id="charts">
      <div>
          @include('components.dashboard')
      </div>

      <div class="charts-container m-auto">
          <h1 class="mb-5 mt-5"> Statistiche </h1>
          <div class="mb-5 p-3">
              <h3> <i class="fa fa-star-half-o" aria-hidden="true"></i> Voti ricevuti: </h3>
              <canvas id="voteMonths"></canvas>
          </div>
          <div class="mb-5 p-3">
              <h3> <i class="fa fa-list-alt" aria-hidden="true"></i> Recensioni per mese: </h3>
              <canvas id="reviewsMonths"></canvas>
          </div>
          <div class="mb-5 p-3">
              <h3> <i class="fa fa-comments" aria-hidden="true"></i> Messaggi per mese: </h3>
              <canvas id="messagesMonths"></canvas>
          </div>
      </div>

  </div>
