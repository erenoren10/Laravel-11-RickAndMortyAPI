<?php

namespace App\Services;

use GuzzleHttp\Client;

class RickAndMortyAPIService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://rickandmortyapi.com/api/',
            'verify' => false,
        ]);
    }

    public function getCharacters()
    {
        $allCharacters = [];
    
        $nextPage = 'character'; 
        while ($nextPage) {
            $response = $this->client->request('GET', $nextPage);
            $data = json_decode($response->getBody()->getContents(), true);
            
            $allCharacters = array_merge($allCharacters, $data['results']); 
            
            $nextPage = $data['info']['next'];
        }
    
        return $allCharacters;
    }
    public function getEpisodes()
    {
        $allEpisodes = [];
    
        $nextPage = 'episode'; 
        while ($nextPage) {
            $response = $this->client->request('GET', $nextPage);
            $data = json_decode($response->getBody()->getContents(), true);
            
            $allEpisodes = array_merge($allEpisodes, $data['results']); 
            
            $nextPage = $data['info']['next'];
        }
    
        return $allEpisodes;
    }
    
    public function getLocation()
    {
        $allLocations = [];
    
        $nextPage = 'location'; 
        while ($nextPage) {
            $response = $this->client->request('GET', $nextPage);
            $data = json_decode($response->getBody()->getContents(), true);
            
            $allLocations = array_merge($allLocations, $data['results']); 
            
            $nextPage = $data['info']['next'];
        }
    
        return $allLocations;
    }

}
