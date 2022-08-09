<?php

namespace App\Controllers;

use App\View;

class ContactsController
{
    public function getWeather(): array
    {
        $city = 'Cesis';
        $weatherToday = file_get_contents(
            "http://api.weatherapi.com/v1/forecast.json?key={$_ENV['API_KEY_WEATHER']}q=$city&days=2&aqi=no&alerts=no");
        $weatherData = json_decode($weatherToday);
        return [$weatherData->current->temp_c, $weatherData->current->condition->icon];
    }

    public function show(): View
    {
        return new View('contact-view.twig', ['weatherAndTime' => $this->getWeather()]);
    }
}

