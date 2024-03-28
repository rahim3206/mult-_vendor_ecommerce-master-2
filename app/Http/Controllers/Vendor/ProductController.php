<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('vendor.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required ',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'status'=>'required',
            'image'=>'required | image',
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->vendor_id = Auth::guard('vendor')->user()->id;
        $product->status = $request->status;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $img = $request->file('image');
        $ext = rand().".".$img->getClientOriginalName();
        $img->move("product_image/",$ext);
        $product->image = $ext;
        $product->save();
        return redirect()->back()->with('success','Product Created Successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function get_sub_categories(Request $request)
    {
        $sub_categories = SubCategory::where('category_id',$request->id)->get();
        $html = "<option selected disabled >Select Sub Category</option>";
        foreach($sub_categories as $sub_category)
        {
            $html .= '<option value="'.$sub_category->id.'">'. $sub_category->title .'</option>';
        }

        return response()->json($html);
    }
}
