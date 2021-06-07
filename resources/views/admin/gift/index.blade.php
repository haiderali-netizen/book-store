@extends("admin.layout.interface")
@section("breadcrumb")
<li class="breadcrumb-item">
    <a href="{{URL::to('/admin')}}">Admin</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Gift</li>
@endsection
@section("content")

<div class="row p-3" style="background-color:white">
    <!-- Start Panel -->
    <div class="col-md-12">
        @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <div class="d-flex justify-content-between">
            <h4>All Gifts</h4>
            <p>
                <a href="{{ Route('gift.create') }}" class="btn btn-primary btn-sm mr-2">Add New</a>
            </p>
        </div>
        <br>
        <table id="myTable" class="table table-striped dt-responsive table-bordered border-collapse" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th class="none">Opertions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gifts as $key => $gift)
                <tr>
                    <td>
                        <input type="checkbox" name="feature[]" value="{{$gift->id}}">
                        {{ $key + 1}}
                    </td>
                    <td>{{$gift->title}}</td>
                    <td>{{ $gift->category? $gift->category->name : '' }}</td>
                    <td><img src="{{ $gift->image }}" alt="" width="80px" height="80px"></td>
                    <td>{{ $gift->price }}</td>
                    <td>{{$gift->stock}}</td>
                    <td>{{ $gift->description }}</td>
                    <td>{{ $gift->status? 'Active' : '' }}</td>
                    <td>
                        <br>
                        <a href="{{ Route('gift.edit', $gift->id) }}"
                            class="btn btn-primary btn-sm float-left">Update</a>
                        <form action="{{ route('gift.destroy', $gift->id) }}" class="float-left" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">REMOVE</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
