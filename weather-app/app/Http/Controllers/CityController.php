<?php

namespace App\Http\Controllers;

use App\Mappers\CityDtoMapper;
use Illuminate\Http\JsonResponse;
use App\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private CityRepositoryInterface $citiesRepository;
    private CityDtoMapper $cityDtoMapper;

    public function __construct()
    {
        $this->citiesRepository = app(CityRepositoryInterface::class);
        $this->cityDtoMapper = app(CityDtoMapper::class);
    }


    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $cities = $this->cityDtoMapper->map($this->citiesRepository->getAll());

        return response()->json($cities);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request): void
    {
        $validated = $request->validate([
            'name' => 'required|unique:cities|max:20'
        ]);

        $this->citiesRepository->create(ucfirst($validated['name']));
    }

    /**
     * @param string $name
     * @return void
     */
    public function delete(string $name): void
    {
        $this->citiesRepository->delete($name);
    }
}
