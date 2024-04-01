@extends('admin.layouts.app')
@section('title', 'Edit Categories')
@section('admin_content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Category</p>
            </div>
          </div>
          <div class="card-body">

            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Category Image</label>
                        <input class="form-control dropify" type="file" name="image" data-default-file="{{ asset('category_image'.'/'.$category->image) }}">
                        @error('image')
                            <span class="validated_txt">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Title</label>
                            <input class="form-control" type="text" placeholder="Category Name" name="title" value="{{ $category->title }}">
                            @error('title')
                                <span class="validated_txt">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Icon <span>(eg: flaticon-smartphone)</span></label>
                            <input class="form-control" type="text" value="{{ $category->icon }}" name="icon">
                            @error('icon')
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
