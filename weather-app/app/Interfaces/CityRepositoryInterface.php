<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface CityRepositoryInterface
{
    /**
     * Get all cities.
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param string $name
     */
    public function create(string $name): void;

    /**
     * @param string $name
     * @return void
     */
    public function delete(string $name): void;
}
