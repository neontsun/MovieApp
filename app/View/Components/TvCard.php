<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TvCard extends Component
{
   public \Illuminate\Support\Collection $tvshow;

   public function __construct($tvshow)
   {
      $this->tvshow = $tvshow;
   }

   public function render(): \Illuminate\Contracts\View\View
   {
      return view('components.tv-card');
   }
}
