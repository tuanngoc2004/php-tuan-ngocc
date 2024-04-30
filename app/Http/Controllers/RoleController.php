<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleService->all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(RoleRequest $request)
    {
        $this->roleService->create($request->validated());
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function show($id)
    {
        $role = $this->roleService->find($id);
        return view('roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = $this->roleService->find($id);
        return view('roles.edit', compact('role'));
    }

    public function update(RoleRequest $request, $id)
    {
        $this->roleService->update($id, $request->validated());
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        $this->roleService->delete($id);
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
