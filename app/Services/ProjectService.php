<?php

namespace App\Services;

use App\Repositories\ProjectRepository;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function all()
    {
        return $this->projectRepository->all();
    }

    public function paginate($perPage)
    {
        return $this->projectRepository->paginate($perPage);
    }

    public function create($data)
    {
        return $this->projectRepository->create($data);
    }

    public function find($id)
    {
        return $this->projectRepository->find($id);
    }

    public function update($id, $data)
    {
        return $this->projectRepository->update($id, $data);
    }

    public function delete($id)
    {
        $this->projectRepository->delete($id);
    }
}
