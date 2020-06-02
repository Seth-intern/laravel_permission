<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{--{!! Html::style('css/bs/bs.min.css') !!}--}}
    <link rel="stylesheet" href="{{ url('css/bs/bs.min.css') }}">

{{--    {!! Html::script('js/jq.js') !!}--}}
    <script src="{{ url('js/jq.j') }}"></script>


</head>

@yield('style')

<body>
@section('content')
@show


</body>
</html>
@section('script')
@show