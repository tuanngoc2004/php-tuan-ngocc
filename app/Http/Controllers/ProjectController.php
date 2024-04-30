<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Company;
use App\Models\Person;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->paginate(1);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $companies = Company::all();
        $persons = Person::all();
        return view('projects.create', compact('companies','persons'));
    }

    public function store(ProjectRequest $request)
    {
        $data = $request->validated();
        $project = $this->projectService->create($data);

        // Lưu các person được chọn vào bảng trung gian
        $project->persons()->sync($request->input('persons'));

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show($id)
    {
        $project = $this->projectService->find($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = $this->projectService->find($id);
        $companies = Company::all(); 
        $persons = Person::all();

        return view('projects.edit', compact('project', 'companies', 'persons'));
    }

    public function update(ProjectRequest $request, $id)
    {
        $data = $request->validated();
        $project = $this->projectService->update($id, $data);

        // Cập nhật lại danh sách person trong bảng trung gian
        if ($request->has('persons')) {
            $project->persons()->sync($request->input('persons'));
        } else {
            // Nếu không có person được chọn, xóa hết các person cũ
            $project->persons()->detach();
        }

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $this->projectService->delete($id);
        return redirect()->route('projects.index')->with('success', 'Company deleted successfully.');
    }
}
