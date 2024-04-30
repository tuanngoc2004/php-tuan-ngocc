<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PersonService;
use App\Http\Requests\PersonRequest;
use App\Services\CompanyService;

class PersonController extends Controller
{
    protected $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    public function index()
    {
        $persons = $this->personService->paginate(1);
        return view('persons.index', compact('persons'));
    }

    public function create(CompanyService $companyService)
    {
        $companies = $companyService->all();
        return view('persons.create', compact('companies'));
    }

    public function store(PersonRequest $request)
    {
        $data = $request->validated();
        $this->personService->create($data);
        return redirect()->route('persons.index');
    }

    public function edit($id, CompanyService $companyService)
    {
        $person = $this->personService->find($id);
        $companies = $companyService->all();
        return view('persons.edit', compact('person', 'companies'));
    }

    public function update(PersonRequest $request, $id)
    {
        $data = $request->validated();
        $this->personService->update($id, $data);
        return redirect()->route('persons.index');
    }

    public function destroy($id)
    {
        $this->personService->delete($id);
        return redirect()->route('persons.index');
    }
}
