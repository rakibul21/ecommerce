@extends('master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">Manage Category</div>
                        <h4 class="text-center text-danger">{{Session::get('message')}}</h4>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="text-color-c text-center">
                                <tr>
                                    <th>SL NO</th>
                                    <th>Category Name</th>
                                    <th>Brand Name</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{isset($product->category->name) ? $product->category->name : ''}}</td>
                                        <td>{{isset($product->brand->title) ? $product->brand->title : ''}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>
                                            <img src="{{asset($product->image)}}" width="100" height="100" alt=""/>
                                        </td>
                                        <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>

                                        <td>
                                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-success">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-danger" onclick="return confirm('Are you sure to delete this..')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
