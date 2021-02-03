@extends('layouts.main')

@section('title')
  {{ $title }}
@endsection

@section('content')

  <div class="container mx-auto px-4 pt-16">
      <div class="popular-movies">
        <h2 class="uppercase tracking-wider text-yellow-500 text-lg
                   font-semibold">
          Popular Movies
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3
                    lg:grid-cols-5 gap-16">

          @foreach($popularMovies as $movie)
            <x-movie-card :movie="$movie"/>
          @endforeach

        </div>
      </div>
    </div>
  <!-- /.popular-movies-->

  <div class="container mx-auto px-4 py-16">
      <div class="now-playing-movies">
        <h2 class="uppercase tracking-wider text-yellow-500 text-lg
                   font-semibold">
          Now Playing
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3
                    lg:grid-cols-5 gap-16">

          @foreach($nowPlayingMovies as $movie)
            <x-movie-card :movie="$movie" />
          @endforeach

        </div>
      </div>
    </div>
  <!-- /.now-playing-movies-->

@endsection
