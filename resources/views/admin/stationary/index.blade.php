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
                <h4>All Stationary</h4>
                <p>
                    <a href="{{ Route('stationary.create') }}" class="btn btn-primary btn-sm mr-2">Add New</a>
                </p>
            </div><br>
            <p class="text-right">
                <button type="submit" name="submit" value="feature"
                    class="btn btn-icon btn-rounded text-success mb-2 p-2"><i class="fa fa-certificate"></i></button>
                <button type="submit" name="submit" value="unfeature"
                    class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-certificate"></i></button>
                <button type="submit" name="submit" value="delete"
                    class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-trash"></i></button>
            </p>
            <table id="myTable" class="table table-striped dt-responsive table-bordered border-collapse"
                style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Feature</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th class="none">Opertions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</form>
@endsection
