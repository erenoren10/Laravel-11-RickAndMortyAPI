<?php

namespace App\Http\Controllers;

use App\Services\RickAndMortyAPIService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $rickAndMortyService;

    public function __construct(RickAndMortyAPIService $rickAndMortyService)
    {
        $this->rickAndMortyService = $rickAndMortyService;
    }

    public function index()
    {
        $locations = $this->rickAndMortyService->getLocation();
        dd($locations);
        return view('characters.index', compact('characters'));
    }
}