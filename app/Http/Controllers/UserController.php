<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest; 
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    private function hashPassword($data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return $data;
    }

    public function index()
    {
        $users = $this->userService->all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data = $this->hashPassword($data);

        $user = $this->userService->create($data);

        $user->roles()->sync($request->input('roles'));

        return redirect()->route('users.index');
    }


    public function edit($id)
    {
        $user = $this->userService->find($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }
    

    public function update(Request $request, $id)
    {

        $data = $request->all();

        if (!isset($data['is_active'])) {
            $data['is_active'] = 0;
        }

        if(empty($data['password'])) {
            unset($data['password']); 
        } else {
            $data['password'] = Hash::make($data['password']); 
        }

        $user = $this->userService->update($id, $data);

        $user->roles()->sync($request->input('roles'));

        return redirect()->route('users.index');
    }   

    public function destroy($id)
    {
        $this->userService->delete($id);
        return redirect()->route('users.index');
    }
}