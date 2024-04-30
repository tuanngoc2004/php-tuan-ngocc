<?php

namespace App\Services;

use App\Repositories\PersonRepository;

class PersonService
{
    protected $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function all()
    {
        return $this->personRepository->all();
    }

    public function paginate($perPage)
    {
        return $this->personRepository->paginate($perPage);
    }

    public function create($data)
    {
        return $this->personRepository->create($data);
    }

    public function find($id)
    {
        return $this->personRepository->find($id);
    }

    public function update($id, $data)
    {
        return $this->personRepository->update($id, $data);
    }

    public function delete($id)
    {
        $this->personRepository->delete($id);
    }
}
