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
                <img src="{{ $character['image'] }}" alt="{{ $character['name'] }}" width="300" height="300">
                <p>Species: {{ $character['species'] }}</p>
                <p>Origin: {{ $character['origin']['name'] }}</p>
                <p>Total Episodes: {{ count($character['episode']) }}</p>
                <p>
                    Episodes:
                    @foreach ($character['episode'] as $episode)
                        <span>{{ basename($episode) }}</span>
                    @endforeach
                </p>
            @endforeach
        @else
            <p>No results</p>
        @endisset

    </body>
</html>
