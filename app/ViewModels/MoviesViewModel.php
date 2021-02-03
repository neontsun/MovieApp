<?php

namespace App\ViewModels;

use Carbon\Carbon;
use ReflectionMethod;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public Array $popularMovies;
    public Array $nowPlayingMovies;
    public Array $genres;

    public function __construct($popularMovies, $nowPlayingMovies, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
    }

    public function popularMovies(): \Illuminate\Support\Collection
    {
        return $this->formatMovies($this->popularMovies);
    }

    public function nowPlayingMovies(): \Illuminate\Support\Collection
    {
        return $this->formatMovies($this->nowPlayingMovies);
    }

    public function genres(): \Illuminate\Support\Collection
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    public function title(): string
    {
        return "Поиск фильмов и сериалов";
    }

    private function formatMovies($movies): \Illuminate\Support\Collection
    {
        return collect($movies)->map(function($movie) {

            $genresFormatted = collect($movie['genre_ids'])
                ->mapWithKeys(function($value) {
                    return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500' .
                    $movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 . '%',
                'release_date' => Carbon::parse($movie['release_date'])
                    ->format('M d, Y'),
                'genres' => $genresFormatted,
            ])->only([
                'poster_path',
                'id',
                'genre_ids',
                'title',
                'vote_average',
                'overview',
                'release_date',
                'genres',
                'original_title'
            ]);
        });

    }

}
