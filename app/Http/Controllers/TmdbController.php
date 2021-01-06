<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TmdbService\TmdbService;

class TmdbController extends Controller
{

	private $movieID;
	private $page;

	public function __construct(Request $request, TmdbService $TmdbService)
	{
		$this->tmdbService = $TmdbService;
		$this->movieID = $request->route()->parameter('id');
		$this->page = $request->route()->parameter('page') ? (int)$request->route()->parameter('page') : 1;
	}

	// didn't use __invoke because we may add new methods here in the future
	public function showSimilar()
	{
		return $this->tmdbService->generateFinalTmdbJson($this->movieID, $this->page);
	}
}
