@extends('master')


@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center mb-3">All Brand Informaion</div>
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <p class="text-center text-success">{{Session::get('messageu')}}</p>
                            <p class="text-center text-success">{{Session::get('messaged')}}</p>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="text-color-c text-center">
                                    <th>SL NO</th>
                                    <th>Brand Title</th>
                                    <th>Category Name</th>
                                    <th>Brand's Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$brand->title}}</td>
                                        <td>{{$brand->category->name}}</td>
                                        <td>
                                            <img src="{{asset($brand->image)}}" alt="" height="50" width="70">
                                        </td>
                                        <td>{{$brand->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                        <td>
                                            <a href="{{route('brand.show', $brand->id)}}" class="btn btn-primary btn-sm">Detail<i class="fa-solid fa-book"></i></a>
                                            <a href="{{route('brand.edit', $brand->id)}}" class="btn btn-success btn-sm">Edit<i class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{route('brand.destroy', $brand->id)}}" method="POST" onsubmit="return confirm('Are you sure to deleted this...')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn btn-danger btn-sm" >Delete<i class="fa-solid fa-trash"></i></button>

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

