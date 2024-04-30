<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CountryService;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
{
    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function index()
    {
        $countries = $this->countryService->all();
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(CountryRequest $request)
    {
        $data = $request->validated();
        $this->countryService->create($data);
        return redirect()->route('countries.index');
    }

    public function edit($id)
    {
        $country = $this->countryService->find($id);
        return view('countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, $id)
    {
        $data = $request->validated();
        $this->countryService->update($id, $data);
        return redirect()->route('countries.index');
    }

    public function destroy($id)
    {
        $this->countryService->delete($id);
        return redirect()->route('countries.index');
    }
}