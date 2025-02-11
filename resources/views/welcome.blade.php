<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rick and Morty Encyclopedia</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>

        <header class="my-4">
            <div class="container-lg">
                <a class="text-decoration-none text-reset" href="/">
                    <h1 class="text-center text-uppercase display-1 lh-1">
                        Rick and Morty
                            <br>
                        Encyclopedia
                    </h1>
                </a>
            </div>
        </header>

        <section>
            <div class="container-lg">
                <form method="get">
                    <div class="row align-items-end justify-content-end">
                        <div class="col-lg-auto">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" name="name" type="text" value="{{ request()->input('name') }}"/>
                        </div>
                        <div class="col-sm-4 col-lg-auto">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value=>Any</option>
                                <option value="alive" {{ (request()->input('status') == 'alive') ? "selected" : "" }}>Alive</option>
                                <option value="dead" {{ (request()->input('status') == 'dead') ? "selected" : "" }}>Dead</option>
                                <option value="unknown" {{ (request()->input('status') == 'unknown') ? "selected" : "" }}>Unknown</option>
                            </select>
                        </div>
                        <div class="col-sm-4 col-lg-auto">
                            <label class="form-label" for="gender">Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value=>Any</option>
                                <option value="female" {{ (request()->input('gender') == 'female') ? "selected" : "" }}>Female</option>
                                <option value="male" {{ (request()->input('gender') == 'male') ? "selected" : "" }}>Male</option>
                                <option value="genderless" {{ (request()->input('gender') == 'genderless') ? "selected" : "" }}>Genderless</option>
                                <option value="unknown" {{ (request()->input('gender') == 'unknown') ? "selected" : "" }}>Unknown</option>
                            </select>
                        </div>
                        <div class="col-sm-4 col-lg-auto mt-4">
                            <button class="btn btn-primary w-100" id="submit" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <main class="my-4">
            <div class="container-lg">
                <div class="row g-4">
                    <div class="col-12">
                        <p class="text-end display-6 m-0">
                            @if ($pagination)
                                {{ $pagination->total() }} Result{{ $pagination->total() > 1 ? "s" : "" }}
                            @else
                                No Results
                            @endif
                        </p>
                    </div>
                    @isset ($characters['results'])
                        @foreach ($characters['results'] as $character)
                            <div class="col-md-6">
                                <div class="border h-100">
                                    <div class="row h-100">
                                        <div class="col-sm-4">
                                            <img src="{{ $character['image'] }}" alt="{{ $character['name'] }}" width="300" height="300" style="max-width: 100%; height: auto; display: block;">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="p-2">
                                                <h2 class="display-6 lh-1">{{ $character['name'] }}</h2>
                                                <p class="m-0">Species: {{ $character['species'] }}</p>
                                                <p class="m-0">Origin: {{ $character['origin']['name'] }}</p>
                                                <p class="m-0">Total Episodes: {{ count($character['episode']) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 align-self-end">
                                            <p class="m-0 p-2">
                                                Episodes:
                                                @foreach ($character['episode'] as $episode)
                                                    <span>{{ basename($episode) }}</span>
                                                    @if (!$loop->last)<span> | </span> @endif
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </main>

        @isset ($characters['results'])
            <footer class="my-4">
                <div class="container-lg">
                    <div class="row">
                        <div class="col-12 d-none d-md-block">
                            {{ $pagination }}
                        </div>
                        <div class="col-12 d-md-none">
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-primary w-100" href="{{ $pagination->previousPageUrl() }}">Previous</a>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary w-100" href="{{ $pagination->nextPageUrl() }}">Next</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-end my-2">
                            <p>Showing {{ $pagination->firstItem() }} to {{ $pagination->lastItem() }} of {{ $pagination->total() }} {{ ($pagination->total() > 1) ? "results" : "result" }}</p>
                        </div>
                    </div>
                </div>
            </footer>
        @endisset

    </body>
</html>
