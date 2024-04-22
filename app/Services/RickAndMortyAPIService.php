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
        $allCharacters = [];
    
        $nextPage = 'episode'; 
        while ($nextPage) {
            $response = $this->client->request('GET', $nextPage);
            $data = json_decode($response->getBody()->getContents(), true);
            
            $allCharacters = array_merge($allCharacters, $data['results']); 
            
            $nextPage = $data['info']['next'];
        }
    
        return $allCharacters;
    }
    
    public function getLocation()
    {
        $allCharacters = [];
    
        $nextPage = 'location'; 
        while ($nextPage) {
            $response = $this->client->request('GET', $nextPage);
            $data = json_decode($response->getBody()->getContents(), true);
            
            $allCharacters = array_merge($allCharacters, $data['results']); 
            
            $nextPage = $data['info']['next'];
        }
    
        return $allCharacters;
    }

}
