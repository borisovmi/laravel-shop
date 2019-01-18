@extends('cms.master')
@section('content')

<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/menu/create')}}" class="btn btn-primary">Add new menu</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12 text-center ">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-sliders-h"></i>
                    Menu</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Menu title</th>
                                    <th>URL</th>
                                    <th>Show item</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>                                
                                <tr>
                                    <th>Menu title</th>
                                    <th>URL</th>
                                    <th>Show item</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>                                
                            </tfoot>
                            <tbody>
                                @foreach($menus as $menu)
                                <tr>
                                    <td>{{$menu['title']}}</td>
                                    <td>{{$menu['url']}}</td>
                                    <td style="font-size: 40px;">
                                    @if($menu['show_item'] == 1)
                                    <i class="fas fa-check-square text-success"></i>
                                    @else
                                    <i class="fas fa-times text-danger"></i>
                                    @endif
                                    </td>
                                    <td><a href="{{url("cms/menu/{$menu['id']}/edit")}}" type="text" class="btn btn-primary">Update</a></td>
                                    <td><a href="{{url("cms/menu/{$menu['id']}")}}" type="text" class="btn btn-danger">Delete</a></td>
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