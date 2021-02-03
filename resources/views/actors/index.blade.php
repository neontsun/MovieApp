@extends('layouts.main')

@section('title')
  {{ $title }}
@endsection

@section('content')

  <div class="container mx-auto px-4 py-16">

    <div class="popular-actors">
      <h2 class="uppercase tracking-wider text-yellow-500 text-lg
                   font-semibold">
        Popular Actors
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3
                    lg:grid-cols-5 gap-16">

        @foreach($popularActors as $actor)

          <div class="actor mt-8">
            <a href="{{ route('actors.show', $actor['id']) }}">
              <img src="{{ $actor['profile_path'] }}"
                   alt="profile image"
                   class="hover:opacity-50 transition ease-in-out duration-150">
            </a>
            <div class="mt-2">
              <a href="{{ route('actors.show', $actor['id']) }}"
                 class="text-lg hover:text-gray-300">
                {{ $actor['name'] }}
              </a>
              <div class="text-sm truncate text-gray-400">
                {{ $actor['known_for'] }}
              </div>
            </div>
          </div>

        @endforeach

      </div>
    </div>
    <!-- /.popular-actors-->

    <div class="page-load-status my-16">
      <div class="flex justify-center">
        <svg
          width="36"
          height="36"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          class="animate-spin fill-current text-gray-500 infinite-scroll-request">
          <path
            d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z"
            fill="currentColor"/>
        </svg>
        <!-- /loading-svg -->
        <p class="infinite-scroll-last">End of content</p>
        <p class="infinite-scroll-error">Error</p>
      </div>
    </div>
    <!-- /.page-load-status-->

  </div>

@endsection

@section('scripts')
  <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
  <script>

    let elem = document.querySelector('.grid');
    let infScroll = new InfiniteScroll( elem, {
      // options
      path: '{{ route('actors.index') }}/page/@{{#}}',
      append: '.actor',
      status: '.page-load-status'
    });

  </script>
@endsection
