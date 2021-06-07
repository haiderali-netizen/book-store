@extends("admin.layout.interface")
@section("breadcrumb")
<li class="breadcrumb-item">
    <a href="{{URL::to('/admin')}}">Admin</a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a href="#">Gift</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Category</li>
@endsection
@section("content")
<div class="row p-3" style="background-color:white">
    <!-- Start Panel -->
    <div class="col-md-12">
        @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <div class="d-flex justify-content-between">
            <h4>All Gift Category</h4>
            <a href="{{ Route('gift-category.create') }}" class="btn btn-primary btn-sm">Add New</a>
        </div><br>
        {{-- <p class="text-right">
                <button type="submit" name="submit" value="delete"
                    class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-trash"></i></button>
            </p> --}}
        <table id="myTable" class="table table-striped dt-responsive table-bordered border-collapse" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Opertions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                <tr>
                    <td>
                        {{ $key + 1 }}
                    </td>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                        <a href="{{ Route('gift-category.edit',$category->id) }}"
                            class="btn btn-primary btn-sm float-left mr-2">Update
                        </a>
                        <form action="{{ Route('gift-category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
