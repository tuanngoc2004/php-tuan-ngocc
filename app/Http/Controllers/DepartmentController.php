<?php

namespace App\Http\Controllers;

use App\Services\DepartmentService;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Company;
use App\Services\CompanyService;

class DepartmentController extends Controller
{
    protected $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        $departments = Department::with('company')->get();
        return view('departments.index', compact('departments'));
    }

    public function create(CompanyService $companyService, DepartmentService $departmentService)
    {
        // $companies = Company::all();
        // $departments = Department::all();
        $companies = $companyService->all();
        $departments = $departmentService->all();
        return view('departments.create', compact('companies', 'departments'));
    }

    public function store(DepartmentRequest $request)
    {
        $this->departmentService->create($request->validated());
        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function show($id)
    {
        $department = Department::with('company')->find($id);
        return view('departments.show', compact('department'));
    }

    public function edit($id, CompanyService $companyService, DepartmentService $departmentService)
    {
        $department = Department::find($id);
        // $companies = Company::all();
        // $departments = Department::all();
        $companies = $companyService->all();
        $departments = $departmentService->all();
        return view('departments.edit', compact('department', 'companies', 'departments'));
    }

    public function update(DepartmentRequest $request, $id)
    {
        $this->departmentService->update($id, $request->validated());
        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy($id)
    {
        $this->departmentService->delete($id);
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
