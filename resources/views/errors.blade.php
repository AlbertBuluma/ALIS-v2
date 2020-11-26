<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}" />
        <title>{{ config('kblis.name') }} {{ config('kblis.version') }}</title>
    </head>
    <body>
        <div class="content error-page">
            <h1><i>Oops!</i> It looks like the page requested doesn't exist!.</h1>
            <div>
                <a class="btn btn-default" href="/">Return to home page</a>
            </div>
        </div>
        @include("footer")
    </body>
</html>
