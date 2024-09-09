<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Services\AdminService;
use App\Http\Requests\StoreUserRequest;

class AdminController extends Controller
{

    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function createUser()
    {
        $roles = Role::all();
        return view('admin.create-user', compact('roles'));
    }

    public function storeUser(StoreUserRequest $request)
    {
        $this->adminService->createUser($request->validated());

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès');
    }
}
