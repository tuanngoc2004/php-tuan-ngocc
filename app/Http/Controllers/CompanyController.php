<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Http\Requests\CompanyRequest;
use App\Models\Person;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        // $persons = Person::with('company')->get();
        $companies = $this->companyService->paginate(1);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyRequest $request)
    {
        $this->companyService->create($request->validated());
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function show($id)
    {
        $company = $this->companyService->find($id);
        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = $this->companyService->find($id);
        return view('companies.edit', compact('company'));
    }

    public function update(CompanyRequest $request, $id)
    {
        $this->companyService->update($id, $request->validated());
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        $this->companyService->delete($id);
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
