<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Pagamento sponsorizzazione</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap.native/4.0.3/bootstrap-native.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
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
<div class="d-flex">
    <div>
        @include('components.dashboard')
    </div>
    <div class="flex-grow-1 p-3">
        <div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="dropin-container"></div>
                    <button class="btn btn-primary" type="submit" id="submit-button">Request payment method</button>
                </div>
            </div>
        </div>
        <meta name="price" content="{{ $price }}">
        <script>
            var button = document.querySelector('#submit-button');
            braintree.dropin.create({
                authorization: "{{ Braintree\ClientToken::generate() }}"
                , container: '#dropin-container'
            }, function(createErr, instance) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    instance.requestPaymentMethod(function(err, payload) {
                        {
                            {
                                $amount = document.querySelector("meta[name='price']").getAttribute('content');
                            }
                        }
                        $.get('{{route('payment.process', ['price' => $price]) }}', {
                                payload
                            }
                            , function(response) {
                                console.log(response.amount);
                                if (response.success && confirm('Sei sicuro di proseguire')) {
                                    alert('Payment successfull!');
                                    document.getElementById('formId').submit()
                                } else {
                                    alert('Payment failed');
                                    document.getElementById('formId').submit()
                                }
                            }, 'json');
                    });
                });
            });
        </script>
    </div>
</div>
@include('components.footer')
</body>
</html>
