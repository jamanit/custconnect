<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\MenuService;
use App\Helpers\RoleHelper;
use Yajra\DataTables\Facades\DataTables;
use App\Models\M_category;

class C_category extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);
        $role  = [
            'isOwner' => RoleHelper::isOwner(),
            'isAdmin' => RoleHelper::isAdmin(),
            'isUser'  => RoleHelper::isUser(),
        ];

        $categories = null;
        if ($role['isOwner'] || $role['isAdmin']) {
            if ($request->ajax()) {
                $categories = M_category::SELECT('*');
                return DataTables::of($categories)->make(true);
            }
        }

        if ($role['isUser']) {
            $categories = M_category::where('created_by', $user_id)->get();
        }

        return view('category.v_index_category', compact('menus', 'role', 'categories'));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $data = $validatedData;
        M_category::create($data);

        return redirect()->route('categories.index')->with('success', __('app.data_added_successfully'));
    }

    public function show(M_category $category)
    {
        //    
    }

    public function edit(M_category $category)
    {
        return response()->json([$category]);
        // return response()->json([
        //     'category_name' => $category->category_name,
        // ]);
    }

    public function update(Request $request, M_category $category)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $data = $validatedData;
        $category->update($data);

        return redirect()->route('categories.index')->with('success', __('app.data_updated_successfully'));
    }

    public function destroy(M_category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', __('app.data_deleted_successfully'));
    }
}
