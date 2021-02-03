<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
   public Array $tvshow;
   public Array $tvImages;

   public function __construct($tvshow, $tvImages)
   {
      $this->tvshow = $tvshow;
      $this->tvImages = $tvImages;
   }

   public function title(): string
   {
      return $this->tvshow['name'];
   }

   public function tvshow(): \Illuminate\Support\Collection
   {
      return collect($this->tvshow)->merge([
         'poster_path' => 'https://image.tmdb.org/t/p/w500'
                           .$this->tvshow['poster_path'],
         'vote_average' => $this->tvshow['vote_average'] * 10 . '%',
         'release_date' => Carbon::parse($this->tvshow['first_air_date'])
                           ->format('M d, Y'),
         'genres' => collect($this->tvshow['genres'])
                     ->pluck('name')
                     ->flatten()
                     ->implode(', '),
         'crew' => collect($this->tvshow['credits']['crew'])
                   ->take(2),
         'cast' => collect($this->tvshow['credits']['cast'])
                   ->take(5)
                   ->map(function($cast) {
                      return collect($cast)->merge([
                         'profile_path' => $cast['profile_path']
                           ? 'https://image.tmdb.org/t/p/w300'.$cast['profile_path']
                           : 'https://via.placeholder.com/300x450',
                      ]);
                   }),
         'images' => collect($this->tvImages['backdrops'])
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
         'original_name',
         'name',
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

}
