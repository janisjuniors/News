<?php

namespace App\Services;

class ShowWeatherTodayService
{
    public function getWeather(): array
    {
        $city = 'Cesis';
        $key = '926812c01453464786085219222107&';
        $weatherToday = file_get_contents(
            "http://api.weatherapi.com/v1/forecast.json?key={$key}q=$city&days=2&aqi=no&alerts=no");
        $weatherData = json_decode($weatherToday);
        return [$weatherData->current->temp_c, $weatherData->current->condition->icon];
    }
}

