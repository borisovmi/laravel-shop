@extends('cms.master')
@section('content')


<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/product/create')}}" class="btn btn-primary">Add new product</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12 text-center ">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-sliders-h"></i>
                    Products</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Product title</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>                                
                                <tr>
                                    <th>Category title</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>                                
                            </tfoot>
                            <tbody>
                                @foreach($products as $item)
                                <tr>
                                    <td>{{$item['title']}}</td>
                                    <td><img src="{{asset('/images/'.$item['image'])}}" width="50px"></td>
                                    <td>{{$item['price']}}</td>
                                    <td>{{$categories[$item['categorie_id']-1]['title']}}</td>
                                    <td><a href="{{url("cms/product/{$item['id']}/edit")}}" type="text" class="btn btn-primary">Update</a></td>
                                    <td><a href="{{url("cms/product/{$item['id']}")}}" type="text" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

        </div>
    </div>
</div>
@endsection
</div>