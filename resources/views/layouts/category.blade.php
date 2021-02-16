<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>10 BEST {{ str_replace('-', ' ', ucfirst($title)) }} of January 2021 by shuffleloot.com</title>
    <meta name="description" content="How to choose the best {{ str_replace('-', ' ', ucfirst($title)) }} 2021? Our {{ str_replace('-', ' ', ucfirst($title)) }} buying guide explains how to compare {{ $title }}s by expert tips."/>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <script src="https://rawgit.com/kottenator/jquery-circle-progress/1.1.3/dist/circle-progress.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/0.6.1/progressbar.min.js" integrity="sha512-7IoDEsIJGxz/gNyJY/0LRtS45wDSvPFXGPuC7Fo4YueWMNOmWKMAllEqo2Im3pgOjeEwsOoieyliRgdkZnY0ow==" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body data-spy="scroll" data-target=".n2" data-offset="50">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/sl-logo-4.png') }}" height="50">
                </a>
                <div class="col-6">
                        <form id="your_form" class="navbar-form d-none d-lg-block" action="" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input spellcheck="false" dir="auto" id="search" type="text" name="category" class="catinput typeahead" placeholder="Show me the best ..." autocomplete="off" autofocus>
                                <div class="input-group-append">
                                  <button id="button1" class="btn btn-outline-secondary b2" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                              </div>
                        </form>
                        <script type="text/javascript">
                            var path = "{{ route('autocomplete') }}";
                            $('#your_form .typeahead').typeahead({

                                hint: true,
                                minLength: 0,
                                highlight: true,

                                source:  function (query, process) {
                                    return $.get(path, { query: query }, function (data) {
                                        return process(data);
                                    });
                                },
                                highlighter: function (item, data) {
                                    var parts = item.split('#'),
                                        html = '<div class="row">';
                                        // html += '<div class="col-md-2 col-2">';
                                        // html += '<img class="s-img" src="'+data.img+'">';
                                        // html += '</div>';
                                        html += '<div class="col-md-10 pl-0">';
                                        html += '<span>'+data.name+'s</span>';
                                        html += '<p class="m-0">See the top 10 '+data.name+'s</p>';
                                        html += '</div>';
                                        html += '</div>';

                                    return html;
                                }
                            });
                            $('#your_form').submit(function(){
                                var formAction = $("#search").val().toLowerCase().replace(/ /g, '-')
                                $("#your_form").attr("action", "/category/" + formAction);
                                });
                                var input = document.getElementById('search');
                                input.focus();
                                input.select();
                        </script>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-3 col-xl-3 text-white text-right mt-1"><span class="h1"><a href="/categories" class="text-white">Topics <i class="fas fa-caret-square-down"></i></span></a></div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>
