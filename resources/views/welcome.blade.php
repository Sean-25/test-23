<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rick and Morty Encyclopedia</title>
    </head>
    <body>

        <h1>Rick and Morty Encyclopedia</h1>

        @isset ($characters['results'])
            @foreach ($characters['results'] as $character)
                <h2>{{ $character['name'] }}</h2>
            @endforeach
        @else
            <p>No results</p>
        @endisset

    </body>
</html>
