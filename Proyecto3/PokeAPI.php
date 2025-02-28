<?php
class ApiClient
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://pokeapi.co/api/v2/';
    }

    public function getPokemon($name)
    {
        $url = $this->baseUrl . 'pokemon/' . $name;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}
