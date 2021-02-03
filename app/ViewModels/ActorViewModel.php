<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
   public Array $actor;
   public Array $social;
   public Array $credits;

   public function __construct($actor, $social, $credits)
   {
      $this->actor = $actor;
      $this->social = $social;
      $this->credits = $credits;
   }

   public function title(): string
   {
      return $this->actor['name'];
   }

   public function actor(): \Illuminate\Support\Collection
   {
      return collect($this->actor)->merge([
         'profile_path' => $this->actor['profile_path']
            ? 'https://image.tmdb.org/t/p/w300/'.$this->actor['profile_path']
            : 'https://ui-avatars.com/api/?size=300&name='.$this->actor['name'],
         'birthday' => Carbon::parse($this->actor['birthday'])->format('M d, Y'),
         'age' => Carbon::parse($this->actor['birthday'])->age,
      ]);
   }

   public function social(): \Illuminate\Support\Collection
   {
      return collect($this->social)->merge([
         'facebook' => $this->social['facebook_id']
                  ? 'https://www.facebook.com/'.$this->social['facebook_id']
                  : null,
         'instagram' => $this->social['instagram_id']
                  ? 'https://www.instagram.com/'.$this->social['instagram_id']
                  : null,
         'twitter' => $this->social['twitter_id']
                  ? 'https://twitter.com/'.$this->social['twitter_id']
                  : null,
      ])
      ->only([
         'facebook',
         'instagram',
         'twitter'
      ]);
   }

   public function knownForMovies(): \Illuminate\Support\Collection
   {
      return collect(collect($this->credits)->get('cast'))
            ->sortByDesc('popularity')
            ->take(5)
            ->map(function($movie) {

               if (isset($movie['title'])) {
                  $title = $movie['title'];
               }
               elseif (isset($movie['name'])) {
                  $title = $movie['name'];
               }
               else {
                  $title = 'untitled';
               }

               return collect($movie)->merge([
                  'backdrop_path' => $movie['backdrop_path']
                        ? 'https://image.tmdb.org/t/p/w150_and_h225_bestv2/'
                           .$movie['backdrop_path']
                        :  'https://via.placeholder.com/150x216',
                  'title' => $title,
                  'linkToPage' => $movie['media_type'] === 'movie'
                        ? route('movies.show', $movie['id'])
                        : route('tv.show', $movie['id'])
               ])
               ->only([
                  'backdrop_path',
                  'id',
                  'title',
                  'linkToPage'
               ]);
            });
   }

   public function credits(): \Illuminate\Support\Collection
   {
      return collect(collect($this->credits)->get('cast'))
            ->map(function($movie) {

               if (isset($movie['release_date'])) {
                  $releaseDate = $movie['release_date'];
               }
               elseif (isset($movie['first_air_date'])) {
                  $releaseDate = $movie['first_air_date'];
               }
               else {
                  $releaseDate = '';
               }

               if (isset($movie['title'])) {
                  $title = $movie['title'];
               }
               elseif (isset($movie['name'])) {
                  $title = $movie['name'];
               }
               else {
                  $title = 'untitled';
               }

               return collect($movie)->merge([
                  'release_date' => $releaseDate,
                  'release_year' => isset($releaseDate)
                                    ? Carbon::parse($releaseDate)->format('Y')
                                    : 'Future',
                  'title' => $title,
                  'character' => isset($movie['character'])
                                 ? $movie['character']
                                 : ''
               ])
               ->only([
                  'title',
                  'release_date',
                  'release_year',
                  'character',
               ]);
            })
            ->sortByDesc('release_date');
   }

}
