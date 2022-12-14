@extends('master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row mb-3">
                <p class="display-5 fw-bold text-center text-decoration-underline pb-3">Products</p>
                @foreach($products as $product)
                    <div class="col-md-3 mb-3">
                        <div class="card card-body bg-dark text-white h-100">
                            <img src="{{ asset($product->image) }}" alt="" height="200">
                            <h3 class="pt-3 text-center">{{ $product->name }}</h3>
                            <span class="pb-3">Category : {{ $product->category->name }} </span>
                            <span class="pb-3">Brand : {{ $product->brand->title }} </span>
                            <a href="{{ route('product.details',['id'=>$product->id]) }}" class="btn btn-primary btn-sm">Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <p class="display-5 fw-bold text-center text-decoration-underline pb-3">Categories</p>
                @foreach($categories as $category)
                    <div class="col-md-3 mb-3">
                        <div class="card card-body bg-dark text-white h-100">
                            <img src="{{ asset($category->image) }}" alt="" height="200">
                            <h3 class="pt-3">{{ $category->name }}</h3>
                            <p class="pt-3">{{ $category->description }}</p>
                            <a href="{{ route('category.details',['id'=>$category->id]) }}" class="btn btn-primary btn-sm">view products</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <p class="display-5 fw-bold text-center text-decoration-underline pb-3" >Brand's</p>
                @foreach($brands as $brand)
                    <div class="col-md-3 mb-3">
                        <div class="card card-body bg-dark text-white h-100">
                            <img src="{{ asset($brand->image) }}" alt="" height="200">
                            <h3 class="pt-3">{{$brand->title}}</h3>
                            <a href="{{ route('brand.details',['id'=>$brand->id]) }}" class="btn btn-primary btn-sm">view products</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
