<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Services\MenuService;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\M_role;

class C_user extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request)
    {
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        if ($request->ajax()) {
            $users = User::with('role')->select('*');
            return DataTables::of($users)
                ->addColumn('role_name', function ($user) {
                    return $user->role ? $user->role->role_name : 'N/A';
                })->make(true);
        }

        return view('user.v_index_user', compact('menus'));
    }

    public function create()
    {
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        $roles = M_role::orderBy('role_name', 'ASC')->get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->role_name];
            })->toArray();

        $status = [
            'active'   => 'active',
            'inactive' => 'inactive',
        ];

        return view('user.v_create_user', compact('menus', 'roles', 'status'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nickname'     => 'required|string|max:255',
            'full_name'    => 'required|string|max:255',
            'email'        => 'required|email|unique:users',
            'password'     => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:255',
            'address'      => 'required|string',
            'role_id'      => 'required|int',
            'status'       => 'required|string|max:255',
        ]);

        $data = $validatedData;
        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        User::create($data);

        return redirect()->route('users.index')->with('success', __('app.data_added_successfully'));
    }

    public function show(User $user)
    {
        //    
    }

    public function edit(User $user)
    {
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        $roles = M_role::orderBy('role_name', 'ASC')->get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->role_name];
            })->toArray();

        $status = [
            'active'   => 'active',
            'inactive' => 'inactive',
        ];

        return view('user.v_edit_user', compact('menus', 'roles', 'status', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nickname'     => 'required|string|max:255',
            'full_name'    => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email,' . $user->id,
            'password'     => 'nullable|string|min:8|confirmed',
            'phone_number' => 'required|string|max:255',
            'address'      => 'required|string',
            'role_id'      => 'required|int',
            'status'       => 'required|string|max:255',
        ]);

        $data = $validatedData;
        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);

        return redirect()->route('users.index')->with('success', __('app.data_updated_successfully'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', __('app.data_deleted_successfully'));
    }
}
