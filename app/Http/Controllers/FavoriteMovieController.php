<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth; 
use App\FavoriteMovie;
use Illuminate\Support\Facades\DB;

class FavoriteMovieController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * Add Favorite Movies
     */
    public function addToFavorite(Request $request) {

    	$request->validate([
            'movie_id' => 'required|exists:movies,id',            
        ]);

    	$favMovie['user_id'] = $this->user->id;
    	$favMovie['movie_id'] = $request->get('movie_id');

        $favMovie = FavoriteMovie::create($favMovie);

        return response()->json(['success' => true], 201);

    }

    /**
     * Get Favorite Movies
     */
    public function getFavorite() {

    	$favMovies = DB::table('favorite_movies')
            ->join('movies', 'favorite_movies.movie_id', '=', 'movies.id')
            ->select('movies.*', 'favorite_movies.user_id')
            ->where('favorite_movies.user_id','=', $this->user->id)
            ->get();	
	
		if (!$favMovies) {
			return response()->json([
				'success' => false,
				'message' => 'Sorry, favorite list is empty'
			], 400);
		}

		return response()->json(['success' => true,'data' => $favMovies]);
    }

}
