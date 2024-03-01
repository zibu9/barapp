<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        $role = $this->authService->getUserRole();

        switch ($role) {
            case 1:
                return to_route('admin.index');
                break;
            case 2:
                return response()->json(['message' => 'Vous êtes un super gerant.']);
                break;
            case 3:
                return response()->json(['message' => 'Vous êtes un super barman.']);
                break;
            default:
                return abort(403);
                break;
        }
    }

    public function register(RegisterRequest $request)
    {
        $request->validated();
        //dd($request->all());
        $user = $this->authService->register($request->all());
        Auth::login($user);
        if (!$user->hasVerifiedEmail()) {
            return to_route('verification.notice');
        }
        return to_route('home');
    }

    public function showVerificationNotice()
    {
        if (Auth::user() && !Auth::user()->hasVerifiedEmail()) {
            return view('auth.verify-email');
        }
        else
        {
            return to_route('home');
        }
    }
}
