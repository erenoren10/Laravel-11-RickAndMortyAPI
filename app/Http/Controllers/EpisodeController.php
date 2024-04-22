<?php

namespace App\Http\Controllers;

use App\Services\RickAndMortyAPIService;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    protected $rickAndMortyService;

    public function __construct(RickAndMortyAPIService $rickAndMortyService)
    {
        $this->rickAndMortyService = $rickAndMortyService;
    }

    public function index()
    {
        $episodes = $this->rickAndMortyService->getEpisodes();
        dd($episodes);
        return view('characters.index', compact('characters'));
    }
}