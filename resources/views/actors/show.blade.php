@extends('layouts.main')

@section('title')
  {{ $title }}
@endsection

@section('content')

  <div class="actor-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
      <div class="flex-none">
        <img src="{{ $actor['profile_path'] }}"
             alt="photo"
             class="w-72 md:w-80">
        <!-- /.actor-image -->
        <ul class="flex items-center mt-4">

          @if($social['facebook'])
            <li class="mr-6">
              <a href="{{ $social['facebook'] }}" title="Facebook">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="text-white hover:text-gray-300"
                >
                  <path
                    d="M9.19795 21.5H13.198V13.4901H16.8021L17.198
                  9.50977H13.198V7.5C13.198 6.94772 13.6457 6.5
                  14.198 6.5H17.198V2.5H14.198C11.4365 2.5 9.19795
                  4.73858 9.19795 7.5V9.50977H7.19795L6.80206
                  13.4901H9.19795V21.5Z"
                    fill="currentColor"
                  />
                </svg>
              </a>
            </li>
            <!-- /.facebook-link -->
          @endif

          @if($social['instagram'])
            <li class="mr-6">
              <a href="{{ $social['instagram'] }}" title="instagram">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="text-white hover:text-gray-300"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M12 7C9.23858 7 7 9.23858 7 12C7 14.7614
                  9.23858 17 12 17C14.7614 17 17 14.7614 17
                  12C17 9.23858 14.7614 7 12 7ZM9 12C9 13.6569
                  10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15
                  10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12Z"
                    fill="currentColor"
                  />
                  <path
                    d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228
                  17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19
                  5.44772 18.5523 5 18 5Z"
                    fill="currentColor"
                  />
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M5 1C2.79086 1 1 2.79086 1 5V19C1 21.2091 2.79086 23
                  5 23H19C21.2091 23 23 21.2091 23 19V5C23 2.79086 21.2091
                  1 19 1H5ZM19 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046
                  3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V5C21
                  3.89543 20.1046 3 19 3Z"
                    fill="currentColor"
                  />
                </svg>
              </a>
            </li>
            <!-- /.instagram-link -->
          @endif

          @if($social['twitter'])
            <li class="mr-6">
              <a href="{{ $social['twitter'] }}" title="twitter">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="text-white hover:text-gray-300"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M8 3C9.10457 3 10 3.89543 10 5V8H16C17.1046
                  8 18 8.89543 18 10C18 11.1046 17.1046 12 16 12H10V14C10
                  15.6569 11.3431 17 13 17H16C17.1046 17 18 17.8954 18
                  19C18 20.1046 17.1046 21 16 21H13C9.13401 21 6 17.866
                  6 14V5C6 3.89543 6.89543 3 8 3Z"
                    fill="currentColor"
                  />
                </svg>
              </a>
            </li>
            <!-- /.twitter-link -->
          @endif

          @if($actor['homepage'])
            <li>
              <a href="{{ $actor['homepage'] }}" title="website">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="text-white hover:text-gray-300"
                >
                  <path
                    d="M4 8C4.55228 8 5 7.55228 5 7C5 6.44772 4.55228 6 4
                6C3.44772 6 3 6.44772 3 7C3 7.55228 3.44772 8 4 8Z"
                    fill="currentColor"
                  />
                  <path
                    d="M8 7C8 7.55228 7.55228 8 7 8C6.44772 8 6 7.55228 6
                7C6 6.44772 6.44772 6 7 6C7.55228 6 8 6.44772 8 7Z"
                    fill="currentColor"
                  />
                  <path
                    d="M10 8C10.5523 8 11 7.55228 11 7C11 6.44772 10.5523 6
                10 6C9.44771 6 9 6.44772 9 7C9 7.55228 9.44771 8 10 8Z"
                    fill="currentColor"
                  />
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M3 3C1.34315 3 0 4.34315 0 6V18C0 19.6569 1.34315 21 3
                21H21C22.6569 21 24 19.6569 24 18V6C24 4.34315 22.6569 3
                21 3H3ZM21 5H3C2.44772 5 2 5.44772 2 6V9H22V6C22 5.44772
                21.5523 5 21 5ZM2 18V11H22V18C22 18.5523 21.5523 19 21
                19H3C2.44772 19 2 18.5523 2 18Z"
                    fill="currentColor"
                  />
                </svg>
              </a>
            </li>
            <!-- /.website-link -->
          @endif

        </ul>
        <!-- /.social-links-block -->
      </div>
      <div class="mt-4 md:mt-0 md:ml-24">
        <h2 class="text-4xl font-semibold">
          {{ $actor['name'] }}
        </h2>
        <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
          <span>
            {{ $actor['birthday'] }}
            ({{ $actor['age'] }} years old)
            in {{ $actor['place_of_birth'] }}
          </span>
        </div>
        <p class="text-gray-300 mt-8">
          {{ $actor['biography'] }}
        </p>

        <h4 class="font-semibold mt-12">Known for</h4>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">

          @foreach($knownForMovies as $movie)

            <div class="mt-4">
              <a href="{{ $movie['linkToPage'] }}">
                <img src="{{ $movie['backdrop_path'] }}"
                     alt="poster"
                     class="hover:opacity-50 transition ease-in-out duration-150
                            md:w-36 w-64"
                >
              </a>
              <a href="{{ $movie['linkToPage'] }}"
                 class="text-sm leading-normal block text-gray-400
                        hover:text-white mt-1 truncate md:w-36 w-64">
                {{ $movie['title'] }}
              </a>
            </div>

          @endforeach

        </div>
        <!-- /.known-for-block -->

      </div>
    </div>
  </div>
  <!-- /.actor-info -->

  <div class="credits border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
      <h2 class="text-4xl font-semibold">Credits</h2>
      <ul class="list-disc leading-loose pl-5 mt-8">

        @foreach($credits as $credit)
          <li>
            {{ $credit['release_year'] }}
            &middot;
            <strong>{{ $credit['title'] }}</strong>
            @if ($credit['character'])
              as {{ $credit['character'] }}
            @endif
          </li>
        @endforeach

      </ul>
    </div>
  </div>
  <!-- /.credits -->

@endsection
