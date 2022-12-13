
@extends('master')

@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card bg-dark text-color-c" style="border: 2px solid lime">
                        <div class="card-header text-center bg-dark text-color-c fw-bold">Add Product Form <hr/></div>
                        <div class="card-body bg-dark text-white">
                            <h4 class="text-center text-danger">{{Session::get('message')}}</h4>
                            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">Category Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="category_id">
                                            <option value="">--Select Category Name--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
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
                                                <option value="{{$brand->id}}">{{$brand->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Product Code</label>
                                    <div class="col-md-9">
                                        <input type="text" name="code" class="form-control" placeholder="Product Code">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Product Description</label>
                                    <div class="col-md-9">
                                        <textarea  name="description" class="form-control" placeholder="Product Description"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Product Image</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Publication status</label>
                                    <div class="col-md-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"  value="1" checked>Published
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"  value="0">Unpublished
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit"  class="btn btn-ouline-lime" value="Create new Product">
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

