<?php

namespace App\Http\Controllers;

use App\Services\RickAndMortyAPIService;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    protected $rickAndMortyService;

    public function __construct(RickAndMortyAPIService $rickAndMortyService)
    {
        $this->rickAndMortyService = $rickAndMortyService;
    }

    public function index()
    {
        $characters = $this->rickAndMortyService->getCharacters();
        dd($characters);
        return view('characters.index', compact('characters'));
    }
}