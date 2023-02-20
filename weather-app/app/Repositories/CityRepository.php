<?php

namespace App\Repositories;

use App\DtoFactories\CityDtoFactory;
use App\Models\City;
use Illuminate\Support\Collection;
use App\Interfaces\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface
{
    private City $model;
    private CityDtoFactory $cityDtoFactory;

    public function __construct()
    {
        $this->model = app(City::class);
        $this->cityDtoFactory = app(CityDtoFactory::class);
    }

    /**
     * Get all cities.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        $cities = $this->model->all();

        return $cities->map(function (City $city) {
            return $this->cityDtoFactory->fromModel($city);
        });
    }

    /**
     * @param string $name
     * @return void
     */
    public function create(string $name): void
    {
        $this->model->name = $name;
        $this->model->save();
    }

    /**
     * @param string $name
     * @return void
     */
    public function delete(string $name): void
    {
        $city = $this->model->where('name', $name)->first();
        $city->delete();
    }
}
