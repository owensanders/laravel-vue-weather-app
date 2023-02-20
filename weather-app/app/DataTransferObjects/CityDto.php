<?php

namespace App\DataTransferObjects;

use Carbon\Carbon;

class CityDto
{
    private ?int $id;
    private ?string $name;
    private ?Carbon $createdAt;
    private ?Carbon $updatedAt;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return CityDto
     */
    public function setId(?int $id): static
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return CityDto
     */
    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getCreatedAt(): ?Carbon
    {
        return $this->createdAt;
    }

    /**
     * @param Carbon|null $createdAt
     * @return CityDto
     */
    public function setCreatedAt(?Carbon $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @param Carbon|null $updatedAt
     * @return CityDto
     */
    public function setUpdatedAt(?Carbon $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
