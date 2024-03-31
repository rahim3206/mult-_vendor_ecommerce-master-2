<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['products'] = Product::orderByDesc('id')->simplePaginate(10);
        return view('vendor.product.index',$data);
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

        if($request->more_images)
        {
            foreach($request->more_images as $image)
            {
                $product_images = new ProductImage();
                $img = $image;
                $ext = rand().".".$img->getClientOriginalName();
                $img->move("product_image/",$ext);
                $product_images->image = $ext;
                $product_images->product_id = $product->id;
                $product_images->save();
           }
        }

        return redirect()->route('vendor.product.index')->with('success','Product Created Successfully!');
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
        $data['product'] = Product::with('images')->find($id);
        $data['categories'] = Category::all();
        return view('vendor.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required ',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'status'=>'required',   
        ]);

        $product = Product::find($id);
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
        if($request->image)
        {
            $mainimagePath = public_path("product_image/{$product->image}");
            if (file_exists($mainimagePath)) {
                unlink($mainimagePath);
            }

            $img = $request->file('image');
            $ext = rand().".".$img->getClientOriginalName();
            $img->move("product_image/",$ext);
            $product->image = $ext;
        }

        $product->update();

        if($request->more_images)
        {
            foreach($request->more_images as $image)
            {
                $product_images = new ProductImage();
                $img = $image;
                $ext = rand().".".$img->getClientOriginalName();
                $img->move("product_image/",$ext);
                $product_images->image = $ext;
                $product_images->product_id = $product->id;
                $product_images->save();
           }
        }

        return redirect()->back()->with('success','Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $mainimagePath = public_path("product_image/{$product->image}");
        if (file_exists($mainimagePath)) {
            unlink($mainimagePath);
        }

        $productImages = ProductImage::where('product_id', $product->id)->get();
        foreach ($productImages as $productImage) {
            $imagePath = public_path("product_image/{$productImage->image}");
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $productImage->delete();
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product and associated images deleted successfully!');
    }


    public function get_sub_categories(Request $request)
    {
        $sub_cate_id = $request->sub_cate_id ?? 0 ;
        $sub_categories = SubCategory::where('category_id', $request->id)->get();
        if($sub_cate_id != 0)
        {
            $html = "";
        }else{
            $html = "<option selected disabled>Select Sub Category</option>";
        }
        foreach ($sub_categories as $sub_category) {
            $html .= '<option value="' . $sub_category->id . '" ' . ($sub_category->id == $sub_cate_id ? "selected" : "") . '>' . $sub_category->title . '</option>';
        }

        return response()->json($html);
    }


    public function change_product_status(Request $request)
    {
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->update();
        return response()->json(['success'=>'Product Status Updated Successfully']);
    }

    public function delete_sub_cate_image(Request $request)
    {
        $id = $request->id;
        $image = ProductImage::find($id);

        $imagePath = public_path("product_image/{$image->image}");
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $image->delete();
        return response()->json('success');
    }
}
