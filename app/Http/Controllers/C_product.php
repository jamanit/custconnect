<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Services\MenuService;
use App\Models\M_product;

class C_product extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);
        $products = M_product::all();

        return view('product.v_index_product', compact('menus', 'products'));
    }

    public function create()
    {
        return view('product.v_create_product');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'        => 'required|string|max:30',
            'name'        => 'required|string|max:255',
            'stock'       => 'required|numeric|min:0',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath     = $request->file('image')->store('product', 'public');
            $data['image'] = $imagePath;
        }

        M_product::create($data);

        return redirect()->route('products.index')->with('success', __('app.data_added_successfully'));
    }

    public function show(M_product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(M_product $product)
    {
        return view('product.v_edit_product', compact('product'));
    }

    public function update(Request $request, M_product $product)
    {
        $request->validate([
            'code'        => 'required|string|max:30',
            'name'        => 'required|string|max:255',
            'stock'       => 'required|numeric|min:0',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $imagePath     = $request->file('image')->store('product', 'public');
            $data['image'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', __('app.data_updated_successfully'));
    }

    public function destroy(M_product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', __('app.data_deleted_successfully'));
    }
}
