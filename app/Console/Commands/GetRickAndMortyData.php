<?php

namespace App\Console\Commands;

use App\Services\RickAndMortyAPIService;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Models\Character;
use App\Models\Location;
use App\Models\Episode;


class GetRickAndMortyData extends Command
{
    protected $signature = 'rickandmorty:getdata';

    protected $rickAndMortyService;

    public function __construct(RickAndMortyAPIService $rickAndMortyService)
    {
        parent::__construct();
        $this->rickAndMortyService = $rickAndMortyService;
    }

    public function handle()
    {
        try {
         
            $characters = $this->rickAndMortyService->getCharacters();
            $locations = $this->rickAndMortyService->getLocation();
            $episodes = $this->rickAndMortyService->getEpisodes();
           
        
            foreach ($characters as $characterData) {
                Character::updateOrCreate(
                    ['id' => $characterData['id']], 
                    $characterData 
                );
            }
            foreach ($locations as $locationData) {
                Location::updateOrCreate(
                    ['id' => $locationData['id']], 
                    $locationData 
                );
            }
            
            foreach ($episodes as $episodeData) {
                Episode::updateOrCreate(
                    ['id' => $episodeData['id']], 
                    $episodeData 
                );
            }
            
            $this->info('Veriler Başarıyla Veri Tabanına Eklendi .');
        } catch (GuzzleException $e) {
            $this->error('Veriler Eklenirken Bir Hata Oluştu: ' . $e->getMessage());
        }
    }
}