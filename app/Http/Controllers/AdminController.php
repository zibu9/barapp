<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AdminService;
use Illuminate\Support\Facades\Hash;
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

    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        $this->adminService->toggleBlockUser($user);

        return redirect()->route('admin.users.index')->with('success', 'Statut de l\'utilisateur mis à jour.');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.edit-user', compact('user', 'roles'));
    }

    // Réinitialiser le mot de passe de l'utilisateur
    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $newPassword = $this->adminService->resetPassword($user);

        return redirect()->route('admin.users.index')->with('success', 'Mot de passe réinitialisé avec succès.');
    }

    // Mettre à jour les informations de l'utilisateur
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->adminService->updateUser($user,
            $request->validate([
                'name' => 'required|string|max:255',
                'firstname' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,'.$user->id,
                'phone' => 'required|string|max:15',
                'role_id' => 'required|exists:roles,id',
            ])
        );

        return redirect()->route('admin.users.index')->with('success', 'Informations mises à jour.');
    }



}
