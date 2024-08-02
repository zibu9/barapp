<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Services\AdminService;

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

    public function createUser()
    {
        $roles = Role::all();
        return view('admin.create-user', compact('roles'));
    }
}
