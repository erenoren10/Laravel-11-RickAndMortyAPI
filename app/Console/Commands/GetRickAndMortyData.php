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
                $character = [
                    'id' => $characterData['id'],
                    'name' => $characterData['name'],
                    'status' => $characterData['status'],
                    'species' => $characterData['species'],
                    'type' => $characterData['type'] ?? null,
                    'gender' => $characterData['gender'],
                    'origin_name' => $characterData['origin']['name'] ?? null,
                    'origin_url' => $characterData['origin']['url'] ?? null,
                    'location_name' => $characterData['location']['name'] ?? null,
                    'location_url' => $characterData['location']['url'] ?? null,
                    'image' => $characterData['image'],
                    'episode' => json_encode($characterData['episode']),
                    'url' => $characterData['url'],
                    'created' => $characterData['created'],
                ];

                Character::updateOrCreate(
                    ['id' => $characterData['id']], 
                    $character 
                );
            }
            
            $this->info('Karakterler Başarıyla Veri Tabanına Eklendi .');
            foreach ($locations as $locationData) {
                Location::updateOrCreate(
                    ['id' => $locationData['id']], 
                    $locationData 
                );
            }
            $this->info('Lokasyonlar Başarıyla Veri Tabanına Eklendi .');

            foreach ($episodes as $episodeData) {
                Episode::updateOrCreate(
                    ['id' => $episodeData['id']], 
                    $episodeData 
                );
            }
            $this->info('Bölümler Başarıyla Veri Tabanına Eklendi .');
            $this->info('Bütün Veriler Başarıyla Veri Tabanına Eklendi .');
        } catch (GuzzleException $e) {
            $this->error('Veriler Eklenirken Bir Hata Oluştu: ' . $e->getMessage());
        }
    }
}
