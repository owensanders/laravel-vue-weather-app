<?php

namespace App\Http\Controllers;

use App\Services\WeatherApiService;
use GuzzleHttp\Exception\GuzzleException;

class WeatherController
{
    protected WeatherApiService $weatherApiService;

    public function __construct()
    {
        $this->weatherApiService = app(WeatherApiService::class);
    }

    /**
     * @param string $name
     * @return mixed
     * @throws GuzzleException
     */
    public function getCurrentWeather(string $name): mixed
    {
        return $this->weatherApiService->getCurrentWeather($name);
    }

    /**
     * @param string $name
     * @return mixed
     * @throws GuzzleException
     */
    public function getWeeklyWeather(string $name): mixed
    {
        return $this->weatherApiService->getWeeklyWeather($name);
    }
}
