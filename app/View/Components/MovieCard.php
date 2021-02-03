<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MovieCard extends Component
{
    public \Illuminate\Support\Collection $movie;

    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('components.movie-card');
    }
}
