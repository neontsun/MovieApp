<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
   public Array $popularTv;
   public Array $topRatedTv;
   public Array $genres;

   public function __construct($popularTv, $topRatedTv, $genres)
   {
      $this->popularTv = $popularTv;
      $this->topRatedTv = $topRatedTv;
      $this->genres = $genres;
   }

   public function popularTv(): \Illuminate\Support\Collection
   {
      return $this->formatTv($this->popularTv);
   }

   public function topRatedTv(): \Illuminate\Support\Collection
   {
      return $this->formatTv($this->topRatedTv);
   }

   public function genres(): \Illuminate\Support\Collection
   {
      return collect($this->genres)->mapWithKeys(function($genre) {
         return [$genre['id'] => $genre['name']];
      });
   }

   public function title(): string
   {
      return 'Тв шоу';
   }

   private function formatTv($tv): \Illuminate\Support\Collection
   {
      return collect($tv)->map(function ($tvshow) {

         $genresFormatted = collect($tvshow['genre_ids'])
                           ->mapWithKeys(function($val) {
                              return [$val => $this->genres()->get($val)];
                           })
                           ->implode(', ');

         return collect($tvshow)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500'
                              .$tvshow['poster_path'],
            'vote_average' => $tvshow['vote_average'] * 10 . '%',
            'release_date' => Carbon::parse($tvshow['first_air_date'])
                              ->format('M d, Y'),
            'genres' => $genresFormatted
         ])->only([
            'poster_path',
            'id',
            'name',
            'original_name',
            'vote_average',
            'release_date',
            'genres',
         ]);
      });

   }

}
