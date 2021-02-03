<div class="relative mt-3 md:mt-0"
     x-data="{ isOpen: true }"
     @click.away="isOpen = false">
  <input wire:model.bouncing.1000ms="search"
         type="text"
         class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1.5
                focus:outline-none focus:ring-2 focus:ring-gray-500
                focus:border-transparent"
         placeholder="Search (Press '/' to focus)"
         x-ref="search"
         @keydown.window="
            if (event.keyCode === 191 || event.keyCode === 111) {
              event.preventDefault();
              $refs.search.focus();
            }
         "
         @focus="isOpen = true"
         @keydown="isOpen = true"
         @keydown.escape.window="isOpen = false"
         @keydown.shift.tab="isOpen = false">
  <!-- /search-input -->
  <div class="absolute top-0">
    <svg class="w-4 fill-current text-gray-500 mt-2 ml-2"
         viewBox="0 0 50 50"><path d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4
         29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625
         30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125
         C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438
         3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219
         28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781
         13.800781 7 21 7 Z"></path></svg>
  </div>
  <!-- /search-svg -->
  <svg
    wire:loading
    width="24"
    height="24"
    viewBox="0 0 24 24"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    class="animate-spin fill-current text-gray-500 absolute top-0 right-0
    mr-1 mt-1">
    <path
      d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z"
      fill="currentColor"/>
  </svg>
  <!-- /loading-svg -->

@if(strlen($search) >= 2)

    <div class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4"
         x-show.transition.opacity="isOpen"
         @keydown.escape.window="isOpen = false">

      @if($searchResults->count() > 0)

        <ul>

          @foreach($searchResults as $result)

            <li class="border-b border-gray-700">
              <a href="{{ route('movies.show', $result['id']) }}"
                 class="block hover:bg-gray-700 px-3 py-3 flex items-center"
                 @if($loop->last) @keydown.tab="isOpen = false" @endif>

                @if($result['poster_path'])
                  <img src="{{ 'https://themoviedb.org/t/p/w92/'.$result['poster_path'] }}"
                       alt="poster"
                       class="w-8">
                @else
                  <img src="https://via.placeholder.com/50x75" alt="poster"
                       class="w-8">
                @endif

                <span class="ml-4">{{ $result['title'] }}</span>
              </a>
            </li>
            <!-- /result-li -->

          @endforeach

        </ul>
        <!-- /results-ul -->

      @else

        <div class="px-3 py-3">
          No results for "{{ $search }}"
        </div>

      @endif

    </div>
    <!-- /search-results-block -->

  @endif
</div>
