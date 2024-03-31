@extends('vendor.layouts.app')
@section('title')
    Edit Product
@endsection
@section('vendor_content')
<style>
    
    .sub_images{
        position:relative;
        width:fit-content;
    }
    .sub_images_delete
    {
        position:absolute;
        top:0px;
        right:0px;
        border:none;
        background-color:transparent;
    }
</style>

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Product</p>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('vendor.product.update',$product->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Main Image</label>
                    <input class="form-control dropify" type="file" name="image" data-default-file="{{ asset('product_image'.'/'.$product->image) }}">
                    @error('image')
                      <span class="validated_txt">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Sub Images</label>
                    <input class="form-control dropify" type="file" name="more_images[]" multiple>
                    @error('more_images')
                      <span class="validated_txt">{{ $message }}</span>
                    @enderror
                  </div>
                    <div class="row">
                        @foreach($product->images as $image)
                            <div class='sub_images'>
                                <button type="button" class="sub_images_delete" data-id="{{ $image->id }}" data-url="{{ route('vendor.product.delete_sub_cate_image') }}"><i class="fa fa-close text-danger"></i></button>
                                <img src="{{ asset('product_image'.'/'.$image->image) }}" height="100px" width="auto">
                            </div>
                        @endforeach
                    </div>
                </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Title</label>
                  <input class="form-control" type="text" value="{{$product->title}}" name="title">
                    @error('title')
                        <span class="validated_txt">{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Price</label>
                  <input class="form-control" type="number" value="{{$product->price}}" name="price">
                  @error('price')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Quantity</label>
                  <input class="form-control" type="number" value="{{$product->quantity}}" name="quantity">
                  @error('quantity')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Category</label>
                <select class="form-control" name="category_id" id="category_id" data-url="{{route('vendor.product.get_sub_categories')}}" data-sub_cate_id="{{$product->sub_category_id}}">
                    <option selected disabled>Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $product->category_id ) selected @endif >{{ $category->title }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Sub Category</label>
                <select class="form-control" name="sub_category_id" id="sub_category_append">

                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Status</label>
                <select class="form-control" name="status" required >
                    <option selected disabled>Select Status</option>
                    <option value="1" @if($product->status == 1) selected @endif>Published</option>
                    <option value="0"  @if($product->status == 0) selected @endif>Draft</option>
                </select>
              </div>
            </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Description</label>
                 <textarea class="summernote" name="description">{{ $product->description }}</textarea>
                </div>
                @error('description')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
              </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">SEO INFO</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Meta Title</label>
                  <input class="form-control" type="text" value="{{$product->meta_title}}" name="meta_title">
                  @error('meta_title')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
               </div>
               <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Meta description</label>
                  <textarea class="form-control" type="text" name="meta_description">{{$product->meta_description}}</textarea>
                  @error('meta_description')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Meta Keywords</label>
                  <input class="form-control" type="text" value="{{$product->meta_keywords}}" name="meta_keywords">
                  @error('meta_keywords')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
              <button class="btn btn-primary btn-sm ms-auto float-end" type="submit">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('vendor_script')
    <script>
        $(document).ready(function(){
            const id = $('#category_id').val();
            const url = $('#category_id').data('url');
            const sub_cate_id = $('#category_id').data('sub_cate_id');
            
            $.ajax({
                type:"GET",
                url:url,
                data:{id:id,sub_cate_id:sub_cate_id},
                success:function(response){
                    $('#sub_category_append').html(response);
                }
            });
        });
    </script>
@endsection