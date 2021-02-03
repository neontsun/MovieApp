<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{

    /** @test */
    public function the_main_page_shows_correct_info()
    {
        $response = $this->get(route('movies.index'));

        $response->assertSuccessful();
        $response->assertSee('Popular Movies');
    }

//    /** @test */
//    public function the_search_dropdown_works_correctly()
//    {
//        Http::fake([
//            'https://themoviedb.org/3/search/movie/?query=Avengers&language=ru-RU' =>
//                $this->fakeSearchMovies(),
//        ]);
//
//        $response = $this->get(route('movies.index'));
//
//        $response->assertSuccessful();
//    }

}
