<?php

namespace App\Services\TmdbService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TmdbService
{

	protected $api_key;
	protected $base_url;
	protected $user_ip;

	public function __construct(Request $request)
	{
		$this->api_key = config('services.tmdb.key');
		$this->base_url = config('services.tmdb.baseurl');
		$this->user_ip = $request->ip();
	}

	public function getContentFromUrl($movieID, $page = 1) : array
	{
		$response = Http::get($this->base_url . $movieID . '/similar', [
			'api_key' => $this->api_key,
			'page' => $page,
		]);
		return $response->json();
	}
	
	public function generateInternalID() : string
	{
		$source = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz_-0123456789";
		$sourceLen = strlen($source);
		$string = '';
		for ($i = 0; $i < 10; $i++) {
			$string .= substr($source, rand(0, $sourceLen - 1), 1);
		}
		return $string;
	}

	public function generateFinalTmdbJson($movieID, $page = 1 ) : string
	{

		if (is_numeric($movieID)){

			$data = $this->getContentFromUrl($movieID, $page);
			if(isset($data['results']))
			{
				$testdata = [
					'success' => true,
					'page' => $page,
					'total_pages' => $data['total_pages'],
					'total_results' => $data['total_results'],
					'user_ip' => $this->user_ip,
				];
				foreach ($data['results'] as $result) {
					$testdata['movies'][] = [
						'name' => $result['original_title'],
						'description' => $result['overview'],
						'poster_path' => $result['poster_path'],
						'internal_id' => $this->generateInternalID(),
					];
				}
			} else {
				$testdata = $data;
			}
		} else {
			$testdata = [
				'success' => false,
				'error' => 'Movie ID missing/invalid',
			];
		}

		return response()->json($testdata, 201)->getContent();
	}
	
}