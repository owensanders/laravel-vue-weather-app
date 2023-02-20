<?php

namespace App\Services;

use GuzzleHttp\Client;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class WeatherApiService
{
    protected Client $client;
    protected string $appId;
    protected string $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->appId = config('weather.app_id');
        $this->baseUrl = config('weather.base_url');
    }

    /**
     * Get weather by city
     *
     * @param string $name
     * @return mixed
     * @throws GuzzleException
     */
    public function getCurrentWeather(string $name): mixed
    {
        try {
            $response = $this->client->request(
                'GET', $this->baseUrl . 'weather?q=' . $name . '&appid=' . $this->appId . '&units=metric'
            );
        }
        catch (Exception $e) {
            logger()->error($e->getMessage());

            return [];
        }

        return $this->responseHandler($response->getBody()->getContents());
    }

    /**
     * Get weather by city
     *
     * @param string $name
     * @return mixed
     * @throws GuzzleException
     */
    public function getWeeklyWeather(string $name): mixed
    {
        try {
            $response = $this->client->request(
                'GET', $this->baseUrl . 'forecast?q=' . $name . '&appid=' . $this->appId . '&units=metric'
            );
        }
        catch (Exception $e) {
            logger()->error($e->getMessage());

            return [];
        }

        return $this->responseHandler($response->getBody()->getContents());
    }

    /**
     * Response handler
     *
     * @param mixed $response
     * @return array|mixed
     */
    public function responseHandler(mixed $response): mixed
    {
        if ($response) {
            return json_decode($response);
        }

        return [];
    }
}
