@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Orders</li>
@endsection
@section("content")
    <div class="row p-3" style="background-color:white">
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
            <h4>Price Per Page</h4>
            <form action="" method="post">
                <label for="">Price Per Page: </label>
                <input type="number" name="total_price" value="{{$totalPricePerPage->total_price}}" required>
                <input type="submit" class="btn btn-primary btn-sm" value="Save">
            </form>
        </div>
    </div><br><br>
    <div class="row p-3" style="background-color:white">
        <!-- Start Panel -->
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h4>All PDF Orders</h4>
                    <!-- <a href="{{URL::to('admin/news/add')}}" class="btn btn-primary btn-sm">Add New</a> -->
                </div><br>
                <!-- <p class="text-right">
                    <button type="submit" name="submit" value="delete" class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-trash"></i></button>
                </p> -->
                <table id="myTable" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total</th>
                            <th>Pages</th>
                            <th>Sides</th>
                            <th>PDF File</th>
                            <th class="none">Color</th>
                            <th class="none">Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totalData as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}} </td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->total}}</td>
                                <td>{{$data->pages}}</td>
                                <td>{{$data->sides}}</td>
                                <td>
                                    <a href="{{URL::to('storage/app')}}/{{$data->file}}" target="_blank">View</a>
                                </td>
                                <td>{{$data->color}}</td>
                                <td>{{$data->comment}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </div>
@endsection
