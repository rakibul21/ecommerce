@extends('master')

@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto" >
                    <div class="card bg-dark text-color-c" style="border: 2px solid lime" >
                        <div class="card-header text-center fw-bold mb-3">Add Brand Form <hr/></div>
                        <div class="card-body">
                            <p class="text-center">{{Session::get('message')}}</p>
                            <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Category Name</label>
                                    <div class="col-md-9">
                                        <select name="category_id" class="form-control">
                                            <option value="">---Category Name------</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Brand Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Short Description</label>
                                    <div class="col-md-9">
                                        <textarea  class="form-control" name="short_description"> </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Long Description</label>
                                    <div class="col-md-9">
                                        <textarea  class="form-control" name="long_description"> </textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-ouline-lime" value="Create New Brand"/>
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

