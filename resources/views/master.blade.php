<!DOCTYPE html>
<!--html-->
    <html lang="es">
        <!--head-->
            <head>

                <!--metas-->
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <meta name="routeName" content="{{ Route::currentRouteName() }}">
                    <meta name="description" content="{{$company[0]->description}}"/>

                <!--icon-->
                    <link rel="icon" type="image/png" href="{{ url('multimedia'.$company[0]->file_path.'/'.$company[0]->file) }}" />

                <!--title-->
                    <title> {!! html_entity_decode($company[0]->company_name, ENT_QUOTES | ENT_XML1, 'UTF-8') !!} @yield('title')</title>

                <!--CSS-->
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
                    <link rel="stylesheet" href="{{ url('/fontawesome/css/all.css') }}">
                    <link rel="stylesheet" href="{{ url('/css/style.css?v='.time()) }}">
                    <link rel="stylesheet" href="{{ url('/css/font.css?v='.time()) }}">
                    <link rel="stylesheet" href="{{ url('/css/querys.css?v='.time()) }}">
                    @yield('css')
                    <style>
                        body {
                          min-height: 100vh;
                          margin: 0;
                          padding: 0;
                        }
                        .container {
                            min-height: 76%;
                            align-items: center;
                        }

                        /* Estilos para el footer */
                        footer {
                          background-color: #343a40;
                          color: white;
                          text-align: center;
                          padding: 10px 0;
                          width: 100%;
                        }
                        .col-md-6 img {
                            max-width: 100%;
                            height: auto;
                            transition: transform 0.3s;
                        }
                        .col-md-6 img:hover {
                            transform: scale(1.05);
                        }
                    </style>
            </head>
        <!--body-->
            <body>
                <!--CookieConsent-->
                    @include('cookieConsent::index')

                <!--Alert errors-->
                    @if (Session::has('message'))
                        <div class="container mt-2">
                            <div class="alert alert-{{ Session::get('typealert') }}" style="display: none;">
                                {{ Session::get('message') }}
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                <!--Content-->
                <!-- Contenido principal -->
                    <div class="container">
                        <h1>angular back</h1>
                    </div>
                <!--Script-->
                    <script src="{{ asset('js/jquery.js') }}"></script>
                    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
                    <script src="{{ asset('js/utils.js') }}"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script src="{{ asset('js/site.js') }}"></script>

                    <!--individual-Script-page-->
                        @yield('scripts')
            </body>
    </html>

