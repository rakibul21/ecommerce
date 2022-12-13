@extends('master')
@section('body')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">All Comment Info</div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-danger">
                            <thead>
                            <tr>
                                <th>SL No</th>
                                <th>User Name</th>
                                <th>Comment</th>
                                <th>Product Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                            <tr>
                                <th>{{$comment->id}}</th>
                                <td>{{$comment->name}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>{{$comment->product->name}}</td>
                                <td>0</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Edit <i class="fa-solid fa-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-sm">Delete <i class="fa-solid fa-trash"></i></a>
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


