<?php

namespace App\Services;

use App\Repositories\CountryRepository;

class CountryService
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function all()
    {
        return $this->countryRepository->all();
    }

    public function create($data)
    {
        return $this->countryRepository->create($data);
    }

    public function find($id)
    {
        return $this->countryRepository->find($id);
    }

    public function update($id, $data)
    {
        return $this->countryRepository->update($id, $data);
    }

    public function delete($id)
    {
        $this->countryRepository->delete($id);
    }
}