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
        if($category->posts->count() === 0)
        {
            $category->delete();
            return response()->json(['success' => 'Xoa thanh cong 1 dong']);
        }
        return response()->json(['error' => 'Khong duoc phep xoa']);
    }

    public function deleteCheckedCategory(Request $request)
    {
        $ids = $request->ids;
        $arr_del = [];

        foreach ($ids as $id){
            if(Category::find($id)->posts->count() === 0)
            {
                array_push($arr_del, $id);
            }
        }
        Category::whereIn('id', $arr_del)->delete();

        return response()->json([
            'messages' => 'Xoa thanh cong cac 1 dong da chon',
            'ids' => $arr_del,
            'noDel' => $ids
        ]);
    }
}
