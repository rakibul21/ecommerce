@extends('master')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row  py-5 bg-dark text-white">
                <div class="col-md-6">
                    <img src="{{ asset($product->image) }}" alt="" height="500" width="500">
                </div>
                <div class="col-md-6">
                    <h2 class="text-center text-color-c">{{ $product->name }}</h2>
                    <p class="fs-3">{{ $product->description }}</p>
                    <p class="fs-3">Code : {{ $product->code }}</p>
                    <p class="fs-5">Category Name: {{ $product->category->name }}</p>
                    <p class="fs-5">Brand Name : {{ $product->brand->title }}</p>
                    <a href="" class="btn btn-success d-block">Add to Cart</a>
                </div>
                <hr/>
                <br>
                <h4 class="text-center  col-md-8 mx-auto">Write Your Comment</h4>
                <hr/>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <h4 class="text-center text-danger">{{Session::get('comment')}}</h4>
                        <form action="{{route('new-product-comment',['id' => $product->id])}}" class="" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <input type="text" class="form-control" name="name"/>
                            </div>
                            <div class="row mb-3">
                                <textarea name="comment" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="row mb-3">
                                <input type="submit" class="btn btn-outline-warning" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection


