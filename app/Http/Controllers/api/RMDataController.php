<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Episode;
use App\Models\Character;


class RMDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getCharacters()
    {
        $characters = Character::all();
        return response()->json($characters);
    }

    public function getEpisodes()
    {
        $episodes = Episode::all();
        return response()->json($episodes);
    }

    public function getLocations()
    {
        $locations = Location::all();
        return response()->json($locations);
    }

    public function getCharacter($id)
    {
        $character = Character::findOrFail($id);
        return response()->json($character);
    }

    public function getLocation($id)
    {
        $location = Location::findOrFail($id);
        return response()->json($location);
    }
    public function getEpisode($id)
    {
        $character = Character::findOrFail($id);
        return response()->json($character);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
