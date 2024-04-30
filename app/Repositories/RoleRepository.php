<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
    public function all()
    {
        return Role::all();
    }

    public function create($data)
    {
        return Role::create($data);
    }

    public function find($id)
    {
        return Role::findOrFail($id);
    }

    public function update($id, $data)
    {
        $role = $this->find($id);
        $role->update($data);
        return $role;
    }

    public function delete($id)
    {
        $role = $this->find($id);
        $role->delete();
    }
}
