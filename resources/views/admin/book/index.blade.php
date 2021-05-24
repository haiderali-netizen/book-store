@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Book</li>
@endsection
@section("content")
<form action="" method="post">
    <div class="row p-3" style="background-color:white">
        <!-- Start Panel -->
        <div class="col-md-12">
            @if(Session::has('danger'))
                @php $message = Session::get('danger'); @endphp
                    <div class="alert alert-danger">{{$message}}</div>
                @php Session::pull('danger'); @endphp
            @endif
            @if(Session::has('success'))
                @php $message = Session::get('success'); @endphp
                    <div class="alert alert-success">{{$message}}</div>
                @php Session::pull('success'); @endphp
            @endif
            <div class="d-flex justify-content-between">
                <h4>All Books</h4>
                <p>
                    <a href="{{URL::to('admin/book/add')}}" class="btn btn-primary btn-sm mr-2">Add New</a>
                </p>
            </div><br>
                <p class="text-right">
                    <button type="submit" name="submit" value="feature" class="btn btn-icon btn-rounded text-success mb-2 p-2"><i class="fa fa-certificate"></i></button>
                    <button type="submit" name="submit" value="unfeature" class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-certificate"></i></button>
                    <button type="submit" name="submit" value="delete" class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-trash"></i></button>
                </p>
            <table id="myTable" class="table table-striped dt-responsive table-bordered border-collapse" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Type</th>
                        @if($value['usertype'] != 2)
                            <th>Author</th>
                        @endif
                        <th>Feature</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th class="none">Opertions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($totalData as $data)
                        @php
                            $category = $data->GetCategory();
                            $type = $data->GetType();
                            $Author = $data->GetAuthor();
                        @endphp
                        <tr>
                            <td>
                                <input type="checkbox" name="feature[]" value="{{$data->id}}">
                                {{$data->id}}
                            </td>
                            <td>{{$data->name}}</td>
                            <td>{{isset($category) ? $category->name : 'null'}}</td>
                            <td>{{isset($type) ? $type->name : 'null'}}</td>
                            @if ($value['usertype'] != 2)
                                <td>{{isset($Author) ? $Author->name : 'null'}}</td>
                            @endif
                            <td class="text-{{$data->feature == 1 ? 'success' : 'danger'}} text-center">
                                    {{$data->feature == 1 ? 'Feature' : 'Unfeature'}}
                            </td>
                            <td>{{$data->stock}}</td>
                            <td>
                                @if ($data->pending == 1)
                                    @if ($value['usertype'] != 2)
                                        <a href="{{URL::to('admin/book/allow')}}/{{$data->id}}" class="btn btn-warning btn-sm">Allow</a>
                                    @else
                                        <p class="text-warning">Pending</p>
                                    @endif
                                @else
                                    <p class="text-success">Active</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{URL::to('admin/book/update')}}/{{$data->id}}" class="btn btn-primary btn-sm">Update</a>
                                <a href="{{URL::to('admin/book/delete')}}/{{$data->id}}" class="deleteAlert btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</form>
@endsection
