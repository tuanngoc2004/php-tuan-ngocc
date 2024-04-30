<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function all()
    {
        return $this->taskRepository->all();
    }

    public function create($data)
    {
        return $this->taskRepository->create($data);
    }

    public function find($id)
    {
        return $this->taskRepository->find($id);
    }

    public function update($id, $data)
    {
        return $this->taskRepository->update($id, $data);
    }

    public function delete($id)
    {
        $this->taskRepository->delete($id);
    }

    public function filter($filters)
    {
        return $this->taskRepository->filter($filters);
    }
}
