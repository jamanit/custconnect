<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Services\MenuService;
use App\Models\User;

class C_profile extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $role_id = Auth::user()->role_id;
        $id      = Auth::user()->id;

        $menus   = $this->menuService->getMenus($role_id);
        $profile = User::find($id);

        return view('profile.v_index_profile', compact('menus', 'profile'));
    }

    public function create()
    {
        return view('profile.v_create_profile');
    }

    public function store(Request $request)
    {
        //    
    }

    public function show(User $profile)
    {
        //    
    }

    public function edit(User $profile)
    {
        // 
    }

    public function update(Request $request, User $profile)
    {
        $validatedData = $request->validate([
            'nickname'     => 'required|string|max:255',
            'full_name'    => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email,' . $profile->id,
            'password'     => 'nullable|string|min:8|confirmed',
            'phone_number' => 'required|string|max:255',
            'address'      => 'required|string',
        ]);

        $data = $validatedData;
        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $profile->update($data);

        return redirect()->route('profile.index')->with('success', __('app.data_updated_successfully'));
    }

    public function destroy(User $profile)
    {
        // 
    }
}
