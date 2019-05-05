<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use JWTAuth; 

class MovieController extends Controller
{
    public function getMovies(Request $request) {

    	$q = $request->get('q');
		$movies = Movie::where('title', 'LIKE', '%' . $q . '%')
		        ->paginate(10);

		return response()->json(['success' => true,'data' => $movies]);        
    }
    

	public function getMovieDetails($id)
	{
		$movie = Movie::find($id);

		if (!$movie) {
			return response()->json([
				'success' => false,
				'message' => 'Sorry, movie with id ' . $id . ' cannot be found'
			], 400);
		}

		return response()->json(['success' => true,'data' => $movie]);
	} 

}
