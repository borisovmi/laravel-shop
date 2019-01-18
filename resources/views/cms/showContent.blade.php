@extends('cms.master')
@section('content')


<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/content/create')}}" class="btn btn-primary">Add new content</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12 text-center ">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-sliders-h"></i>
                    Content</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Content title</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>                                
                                <tr>
                                    <th>Content title</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>                                
                            </tfoot>
                            <tbody>
                                @foreach($contents as $item)
                                <tr>
                                    <td>{{$item['heading']}}</td>
                                    <td><a href="{{url("cms/content/{$item['id']}/edit")}}" type="text" class="btn btn-primary">Update</a></td>
                                    <td><a href="{{url("cms/content/{$item['id']}")}}" type="text" class="btn btn-danger">Delete</a></td>
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
