<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CountriesController extends AbstractController
{
    public $countries;

    public function loadCountryData()
    {
        $this->countries = json_decode(file_get_contents('https://restcountries.com/v2/all?fields=name,population,region'), true);
    }

    #[Route(path: '/', name: 'list', methods: ['GET'])]
    public function list(): Response
    {
        $this->loadCountryData();

        return $this->render('countries/layout.html.twig', [
            'countries' => $this->countries
        ]);
    }

    #[Route(path: '/lith', name: 'lith', methods: ['GET'])]
    public function lith(): Response
    {
        $this->loadCountryData();

        $popLith = array_column($this->countries, 'population', 'name')['Lithuania'];

        $filtered = [];
        foreach ($this->countries as $country) {
            if ($country['population'] < $popLith) {
                array_push($filtered, array(
                    'name' => $country['name'],
                    'population' => $country['population'],
                    'region' => $country['region']
                ));
            }
        }

        return $this->render('countries/layout.html.twig', [
            'countries' => $filtered
        ]);
    }

    #[Route(path: '/europe', name: 'europe', methods: ['GET'])]
    public function europe(): Response
    {
        $this->loadCountryData();

        $filtered = [];
        foreach ($this->countries as $country) {
            if ($country['region'] === 'Europe') {
                array_push($filtered, array(
                    'name' => $country['name'],
                    'population' => $country['population'],
                    'region' => $country['region']
                ));
            }
        }

        return $this->render('countries/layout.html.twig', [
            'countries' => $filtered
        ]);
    }
}
