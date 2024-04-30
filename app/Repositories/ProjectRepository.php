<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    public function all()
    {
        return Project::all();
    }

    public function paginate($perPage)
    {
        return Project::paginate($perPage);
    }

    public function create($data)
    {
        return Project::create($data);
    }

    public function find($id)
    {
        return Project::findOrFail($id);
    }

    public function update($id, $data)
    {
        $project = $this->find($id);
        $project->update($data);
        return $project;
    }

    public function delete($id)
    {
        $project = $this->find($id);
        $project->delete();
    }
}