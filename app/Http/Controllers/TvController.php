<?php

namespace App\Http\Controllers;

use App\ViewModels\MovieViewModel;
use App\ViewModels\TvShowViewModel;
use App\ViewModels\TvViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{

   public function index()
   {
      $popularTv = Http::withToken(config('services.tmdb.token'))
         ->get('https://api.themoviedb.org/3/tv/popular?language=ru-RU')
         ->json()['results'];

      $topRatedTv = Http::withToken(config('services.tmdb.token'))
         ->get('https://api.themoviedb.org/3/tv/top_rated?language=ru-RU')
         ->json()['results'];

      $genres = Http::withToken(config('services.tmdb.token'))
         ->get('https://api.themoviedb.org/3/genre/tv/list?language=ru-RU')
         ->json()['genres'];

      $viewModel = new TvViewModel(
         $popularTv,
         $topRatedTv,
         $genres
      );

      return view('tv.index', $viewModel);
   }

   public function show($id)
   {
      $tvshow = Http::withToken(config('services.tmdb.token'))
         ->get('https://api.themoviedb.org/3/tv/'.$id.'
                      ?append_to_response=credits,videos&language=ru-RU')
         ->json();

      $tvImages = Http::withToken(config('services.tmdb.token'))
         ->get('https://api.themoviedb.org/3/tv/'.$id.'/images')
         ->json();

      $viewModel = new TvShowViewModel(
         $tvshow,
         $tvImages
      );

      return view('tv.show', $viewModel);
   }

}
