@extends("admin.layout.interface")
@section("breadcrumb")
<li class="breadcrumb-item">
    <a href="{{URL::to('/admin')}}">Admin</a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="{{ Route('stationary.index') }}">Stationary</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Category</li>
@endsection
@section("content")
<form method="post">
    <div class="row p-3" style="background-color:white">
        <!-- Start Panel -->
        <div class="col-md-12">
            @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <div class="d-flex justify-content-between">
                <h4>All Stationary Category</h4>
                <a href="{{ Route('stationary-category.create') }}" class="btn btn-primary btn-sm">Add New</a>
            </div><br>
            {{-- <p class="text-right">
                <button type="submit" name="submit" value="delete"
                    class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-trash"></i></button>
            </p> --}}
            <table id="myTable" class="table table-striped dt-responsive table-bordered border-collapse"
                style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Opertions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>
                            <input type="checkbox" name="feature[]" value="{{$category->id}}">
                            {{$category->id}}
                        </td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{ Route('stationary-category.edit',$category->id) }}"
                                class="btn btn-primary btn-sm float-left mr-2">Update</a>
                            <form action="{{ Route('stationary-category.destroy',$category->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm deleteAlert">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</form>
@endsection
