<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Company;
use App\Models\Person;
use App\Models\Project;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TasksExport;

class TaskController extends Controller
{
    protected $taskService;
    protected $excelExportService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request)
    {
        $companies = Company::all(); 
        $projects = Project::all();
        $persons = Person::all(); 
        $filters = $request->only(['company_id', 'project_id', 'person_id', 'status', 'priority', 'name']);
        $tasks = $this->taskService->filter($filters);
        return view('tasks.index', compact('tasks', 'companies','projects','persons')); 
    }

    public function create()
    {
        $projects = Project::all();
        $persons = Person::all(); 
        return view('tasks.create', compact('projects', 'persons'));
    }

    public function store(TaskRequest $request)
    {
        $this->taskService->create($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show($id)
    {
        $task = $this->taskService->find($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = $this->taskService->find($id);
        $projects = Project::all(); 
        $persons = Person::all(); 
        return view('tasks.edit', compact('task', 'projects', 'persons'));
    }

    public function update(TaskRequest $request, $id)
    {
        $this->taskService->update($id, $request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $this->taskService->delete($id);
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function exportTask()
    {
        return Excel::download(new TasksExport, 'tasks.xlsx');
    }
}
