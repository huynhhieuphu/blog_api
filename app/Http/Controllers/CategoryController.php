<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('category.index', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $category = new Category();
        $category->name = ucwords($request->name);
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        return response()->json($category);
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = ucwords($request->name);
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        return response()->json($category);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json(['success' => 'Xoa thanh cong 1 dong']);
    }

    public function deleteCheckedCategory(Request $request)
    {
        Category::whereIn('id', $request->ids)->delete();
        return response()->json(['success' => 'Xoa thanh cong cac 1 dong da chon']);
    }
}
