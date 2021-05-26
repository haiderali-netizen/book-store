@extends("admin.layout.interface")
@section("breadcrumb")
<li class="breadcrumb-item">
    <a href="{{URL::to('/admin')}}">Admin</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Stationary</li>
@endsection
@section("content")
<form action="" method="post">
    <div class="row p-3" style="background-color:white">
        <!-- Start Panel -->
        <div class="col-md-12">
            @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <div class="d-flex justify-content-between">
                <h4>All Stationary</h4>
                <p>
                    <a href="{{ Route('stationary.create') }}" class="btn btn-primary btn-sm mr-2">Add New</a>
                </p>
            </div><br>
            {{-- <p class="text-right">
                <button type="submit" name="submit" value="feature"
                    class="btn btn-icon btn-rounded text-success mb-2 p-2"><i class="fa fa-certificate"></i></button>
                <button type="submit" name="submit" value="unfeature"
                    class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-certificate"></i></button>
                <button type="submit" name="submit" value="delete"
                    class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-trash"></i></button>
            </p> --}}
            <table id="myTable" class="table table-striped dt-responsive table-bordered border-collapse"
                style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Description</th>
                        <th class="none">Opertions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stationries as $key => $stationary)
                    <tr>
                        <td>
                            <input type="checkbox" name="feature[]" value="{{$stationary->id}}">
                            {{ $key + 1}}
                        </td>
                        <td>{{$stationary->name}}</td>
                        <td>{{ $stationary->category->name }}</td>
                        <td><img src="{{ $stationary->image }}" alt="" width="80px" height="80px"></td>
                        <td>{{ $stationary->price }}</td>
                        <td>{{$stationary->stock}}</td>
                        <td>{{ $stationary->short_description }}</td>
                        <td>
                            <br>
                            <a href="{{ Route('stationary.edit', $stationary->id) }}"
                                class="btn btn-primary btn-sm float-left">Update</a>
                            <form action="{{ Route('stationary.destroy', $stationary->id) }}" class="float-left"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="deleteAlert btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure to delete this?');">Delete</button>
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
