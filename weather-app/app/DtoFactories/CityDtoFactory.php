<?php

namespace App\DtoFactories;

use App\DataTransferObjects\CityDto;
use App\Models\City;

class CityDtoFactory
{
    /**
     * @param City $city
     * @return CityDto
     */
    public function fromModel(City $city): CityDto
    {
        $dto = new CityDto();
        $dto->setId($city->id ?? null);
        $dto->setName($city->name ?? null);
        $dto->setCreatedAt($city->created_at ?? null);
        $dto->setUpdatedAt($city->updated_at ?? null);

        return $dto;
    }
}
