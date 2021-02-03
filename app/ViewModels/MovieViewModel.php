<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
   public Array $movie;
   public Array $movieImages;

   public function __construct($movie, $movieImages)
   {
      $this->movie = $movie;
      $this->movieImages = $movieImages;
   }

   public function movie(): \Illuminate\Support\Collection
   {
      return collect($this->movie)->merge([
         'poster_path' => 'https://image.tmdb.org/t/p/w500' .
                           $this->movie['poster_path'],
         'vote_average' => $this->movie['vote_average'] * 10 . '%',
         'release_date' => Carbon::parse($this->movie['release_date'])
                           ->format('M d, Y'),
         'genres' => collect($this->movie['genres'])->pluck('name')
                     ->flatten()
                     ->implode(', '),
         'crew' => collect($this->movie['credits']['crew'])->take(2),
         'cast' => collect($this->movie['credits']['cast'])->map(function ($cast) {
                        return collect($cast)->merge([
                           'profile_path' => 'https://image.tmdb.org/t/p/w500/'.
                                             $cast['profile_path']
                        ]);
                   })
                   ->take(5),
         'images' => collect($this->movieImages['backdrops'])
                     ->map(function ($image) {
                        return collect($image)
                        ->only([
                           'file_path',
                        ]);
                     })
                     ->take(9)
      ])
      ->only([
         'genres',
         'id',
         'original_title',
         'title',
         'overview',
         'poster_path',
         'release_date',
         'vote_average',
         'videos',
         'crew',
         'cast',
         'images'
      ]);
   }

   public function title(): string
   {
      return $this->movie['title'];
   }
}
