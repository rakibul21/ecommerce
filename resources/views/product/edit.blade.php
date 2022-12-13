
@extends('master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header bg-success text-white fw-bold">Update Product Form</div>
                        <div class="card-body bg-dark text-white">
                            <h4 class="text-center text-danger">{{Session::get('message')}}</h4>
                            <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label class="col-md-3">Category Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="category_id">
                                            <option value="">--Select Category Name--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"{{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Brand Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="brand_id">
                                            <option value="">--Select Brand Name--</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}"{{$product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$product->name}}" name="name" class="form-control" placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Product Code</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$product->code}}" name="code" class="form-control" placeholder="Product Code">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Product Description</label>
                                    <div class="col-md-9">
                                        <textarea  name="description" class="form-control" placeholder="Product Description">{{$product->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Product Image</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control-file"><br/>
                                        <img src="{{asset($product->image)}}" height="70" width="80"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Publication status</label>
                                    <div class="col-md-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" {{$product->status == 1 ? 'selected' : '' }} type="radio" name="status"  value="1" checked>Published
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" {{$product->status == 0 ? 'selected' : '' }}  type="radio" name="status"  value="0">Unpublished
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit"  class="btn btn-outline-danger" value="Update  Product">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
