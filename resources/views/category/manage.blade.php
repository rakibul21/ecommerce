@extends('master')

@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center mb-3">All Category Information</div>
                        <p class="text-center text-color-c">{{Session::get('message')}}</p>
                        <p class="text-center text-color-c">{{Session::get('messaged')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                    <th> Category Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td><img src="{{asset($category->image)}}" alt="" height="50" width="70"></td>
                                        <td>
                                            <a href="{{route('category.edit',['id' => $category->id])}}" class="btn btn btn-success btn-sm">Edit</a>
                                            <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn btn-danger btn-sm" >Delete</a>
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

