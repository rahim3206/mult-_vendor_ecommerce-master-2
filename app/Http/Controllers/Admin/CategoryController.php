<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::with('sub_categories')->simplePaginate(10);
        return view('admin.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required | unique:categories',
            'icon'=>'required',
            'image'=>'required | image',
        ]);


        $category = new Category();
        $category->title = $request->title;
        $category->icon = $request->icon;
        $img = $request->file('image');
        $ext = rand().".".$img->getClientOriginalName();
        $img->move("category_image/",$ext);
        $category->image = $ext;
        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'Category has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['category'] = Category::find($id);
        return view('admin.category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required ',
            'icon'=>'required',
        ]);


        $category = Category::find($id);
        $category->title = $request->title;
        $category->icon = $request->icon;
        if($request->image)
        {
            $mainimagePath = public_path("category_image/{$category->image}");
            if (file_exists($mainimagePath)) {
                unlink($mainimagePath);
            }

            $img = $request->file('image');
            $ext = rand().".".$img->getClientOriginalName();
            $img->move("category_image/",$ext);
            $category->image = $ext;
        }
        $category->update();
        return redirect()->route('admin.categories.index')->with('success', 'Category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $mainimagePath = public_path("category_image/{$category->image}");
        if (file_exists($mainimagePath)) {
            unlink($mainimagePath);
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category has been deleted successfully');
    }
}
