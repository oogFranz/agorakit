@extends('app')

@section('css')
    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="<?= asset($dir.'/css/elfinder.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset($dir.'/css/theme.css') ?>">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
@stop


@section('js')
    <!-- jQuery and jQuery UI (REQUIRED) -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <!-- elFinder JS (REQUIRED) -->
    <script src="{{ asset($dir.'/js/elfinder.min.js') }}"></script>

    @if($locale)
        <!-- elFinder translation (OPTIONAL) -->
        <script src="{{ asset($dir."/js/i18n/elfinder.$locale.js") }}"></script>
    @endif



    <!-- elFinder initialization (REQUIRED) -->
    <script type="text/javascript" charset="utf-8">
    // Documentation for client options:
    // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
    $().ready(function() {
        $('#elfinder').elfinder({
            // set your elFinder options here
            @if($locale)
            lang: '{{$locale}}', // locale
            @endif
            customData: {
                _token: '{{csrf_token()}}'
            },
            url : '{{ Request::url() }}/connector'  // connector URL
        });
    });
    </script>

@stop


@section('content')
    @include('partials.grouptab')

    <div class="tab_content">
        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>


    </div>


@endsection