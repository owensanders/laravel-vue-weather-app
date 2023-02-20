<?php

namespace App\Mappers;

use App\DataTransferObjects\CityDto;
use Illuminate\Support\Collection;

class CityDtoMapper
{
    /**
     * @param Collection $cities
     * @return Collection
     */
    public function map(Collection $cities): Collection
    {
        return $cities->map(function (CityDto $city) {
            return [
                'id' => $city->getId(),
                'name' => $city->getName(),
            ];
        });
    }
}
