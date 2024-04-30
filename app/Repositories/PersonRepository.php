<?php

namespace App\Repositories;

use App\Models\Person;

class PersonRepository
{
    public function all()
    {
        return Person::all();
    }

    public function paginate($perPage)
    {
        return Person::paginate($perPage);
    }

    public function create($data)
    {
        if (!isset($data['company_id'])) {
            throw new \InvalidArgumentException("Missing 'company_id' field.");
        }
        return Person::create($data);
    }

    public function find($id)
    {
        return Person::findOrFail($id);
    }

    public function update($id, $data)
    {
        $person = $this->find($id);
        $person->update($data);
        return $person;
    }

    public function delete($id)
    {
        $person = $this->find($id);
        $person->delete();
    }
}